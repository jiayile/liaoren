# erphp-weixin-scan
Erphp Weixin Scan是模板兔开发的一款关注微信公众号一键登录网站的WordPress插件。

目前只有认证的服务号有生成带参数的二维码接口权限，这个接口权限可用于关注公众号登录，这个功能模板兔几年前就已经给用户做过了。但是，由于我们的用户大多数都是个人用户，没法申请服务号以及认证（微信的各种认证都需要花钱），怎么办？没事！我们这款插件支持未认证的订阅号实现关注公众号一键登录网站！

由于未认证的订阅号接口权限有限，没法获取用户昵称、头像信息。而且需要区分微信开放平台的扫码登录接口。

<h3>使用方法：</h3>
新建页面，输入短代码[erphp_weixin_scan]即可