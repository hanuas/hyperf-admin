<?php declare(strict_types=1);

namespace Oyhdd\Admin\Middleware;

use Hyperf\HttpServer\Contract\ResponseInterface as HttpResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Phper666\JwtAuth\Jwt;
use Phper666\JwtAuth\Exception\TokenValidException;
use Hyperf\Contract\SessionInterface;
use Illuminate\Support\MessageBag;
use Hyperf\Utils\Context;
use Oyhdd\Admin\Model\AdminUser;

class AuthMiddleware implements MiddlewareInterface
{
    /**
     * @var HttpResponse
     */
    protected $response;

    protected $prefix = 'Bearer';

    protected $jwt;

    protected $session;

    public function __construct(HttpResponse $response, Jwt $jwt, SessionInterface $session)
    {
        $this->response = $response;
        $this->jwt = $jwt;
        $this->session = $session;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        try {
            $cookies = $request->getCookieParams();
            $token = $cookies['Authorization'] ?? '';
            $token = ucfirst($token);
            $arr = explode($this->prefix . ' ', $token);
            $token = $arr[1] ?? '';
            if (empty($token)) {
                throw new TokenValidException('登录态失效，请重新登录');
            }

            if (!$this->jwt->checkToken($token)) {
                throw new TokenValidException('登录态失效，请重新登录');
            }

            $tokenObj = $this->jwt->getTokenObj($token);
            $userId = $tokenObj->getClaim('id');
            $user = AdminUser::where('id', $userId)->where('status', AdminUser::STATUS_ENABLE)->first();
            if (empty($user)) {
                throw new TokenValidException('登录态失效，请重新登录');
            }

            $request = $request->withAttribute('user', $user);
            Context::set(ServerRequestInterface::class, $request);

            // 当前已锁屏锁屏
            $lock = $tokenObj->getClaim('lock', false);
            var_dump($lock);
            if ($lock) {
                return $this->response->redirect('/admin/user/lock');
            }

            return $handler->handle($request);
        } catch (TokenValidException $e) {
            $this->session->forget('Authorization');
        } catch (\Throwable $t) {
            var_dump($t->getMessage());
        }

        return $this->response->redirect('/admin/user/login');
    }
}
