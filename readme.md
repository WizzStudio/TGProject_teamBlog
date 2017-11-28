# teamBlogAPI接口文档

## 说明
* 目前五个主要接口已完成，本次测试ok。(文档中blog.app为本地环境)，线上时会换成实际域名。数据内容格式正常情况下不会更换，数据类型全部为json不变.

### 团队信息
* url:http://blog.app/team
* type:get
* param:无
* data:  
```
{
  "id": 1,
  "name": "TG\u5de5\u4f5c\u5ba4",
  "desc": "TG\u5de5\u4f5c\u5ba4",
  "github": "https:\/\/github.com\/TGclub",
  "url": "http:\/\/blog.app\/storage\/MTUxMTg3MTg1Mg==.jpeg",
  "website": "http:\/\/portal.helloyzy.cn\/home",
  "created_at": "2017-11-28 20:07:54",
  "updated_at": "2017-11-28 20:24:12"
}
```
* 说明：name：名称  desc：简介  url：团队头像地址  website：主页  github：团队Github

### 友情链接
* url:http://blog.app/link
* type:get
* param:无
* data:  
```
[
  {
    "id": 1,
    "name": "\u5de5\u4f5c\u5ba4\u4e3b\u9875",
    "href": "http:\/\/portal.helloyzy.cn\/home",
    "created_at": "2017-11-28 20:24:43",
    "updated_at": "2017-11-28 20:24:43"
  },
  {
    "id": 2,
    "name": "\u897f\u5b89\u7535\u5b50\u79d1\u6280\u5927\u5b66",
    "href": "http:\/\/www.xidian.edu.cn\/",
    "created_at": "2017-11-28 20:25:33",
    "updated_at": "2017-11-28 20:25:33"
  }
]
```
* 说明：name:名称  href：链接

### 文章
#### index
* url:http://blog.app/articles
* type;get
* param:无
* data:  
```
{
  "current_page": 1,
  "data": [
    {
      "id": 1,
      "user_id": 1,
      "tag_id": 1,
      "view": 0,
      "name": "PHP\u4e2d\u53cd\u5e8f\u5217\u5316\u5f15\u8d77\u7684\u5b89\u5168\u95ee\u9898",
      "md_content": "# php\u4e2d\u7684\u7c7b\u4e0e\u5e8f\u5217\u5316\r\n       \u548c\u5176\u4ed6\u9762\u5411\u5bf9\u8c61\u7684\u8bed\u8a00\u4e00\u6837\uff0cphp\u4e2d\u4e5f\u53ef\u4ee5\u901a\u8fc7\u7c7b\u7684\u65b9\u5f0f\u6765\u5c01\u88c5\u4e00\u4e9b\u53d8\u91cf\u548c\u65b9\u6cd5\uff0c\u901a\u8fc7\u7c7b\u7684\u5b9a\u4e49\u53ef\u4ee5\u4f7f\u6211\u4eec\u7684\u7a0b\u5e8f\u53d8\u5f97\u66f4\u52a0\u7b80\u6d01\u548c\u65b9\u4fbf\u3002\u800c\u5e8f\u5217\u5316\u7684\u4e00\u5927\u4e3b\u8981\u7528\u9014\u5c31\u662f\u5e8f\u5217\u5316\u4e00\u4e2a\u7c7b\u5bf9\u8c61\uff0c\u8ba9\u5b83\u53d8\u6210\u4e00\u4e2a\u5b57\u7b26\u4e32\u5f62\u5f0f\uff0c\u4f7f\u5f97\u6570\u636e\u65b9\u4fbf\u4f20\u8f93\u548c\u50a8\u5b58\uff0c\u4e3e\u4e2a\u4f8b\u5b50\u3002 \r\n![](http:\/\/oeix47n80.bkt.clouddn.com\/%E5%B1",
      "created_at": "2017-11-28 20:12:20",
      "updated_at": "2017-11-28 20:12:20",
      "user": {
        "id": 1,
        "name": "DenverB",
        "email": "851166182@qq.com",
        "created_at": "2017-11-28 20:07:54",
        "url": "http:\/\/blog.app\/storage\/MTUxMTg3MTcwMw==.jpeg",
        "sign": "\u4e0d\u75af\u9b54\uff0c\u4e0d\u6210\u6d3b",
        "key_word": "php laravel web\u5b89\u5168",
        "github": "https:\/\/github.com\/DenverBYF",
        "website": null
      },
      "tag": {
        "id": 1,
        "name": "web\u5b89\u5168",
        "created_at": "2017-11-28 20:12:20"
      }
    },
    {
      "id": 2,
      "user_id": 1,
      "tag_id": 2,
      "view": 0,
      "name": "php\u4e2d\u7684\u591a\u8fdb\u7a0b",
      "md_content": "# \u8fdb\u7a0b\u4e0e\u7ebf\u7a0b \r\n       \u770b\u8fc7\u4e00\u4e2a\u5f88\u5f62\u8c61\u7684\u6bd4\u55bb\uff0c\u4e00\u4e2a\u8f6f\u4ef6\u6216\u8005\u7a0b\u5e8f\u5c31\u50cf\u4e00\u4e2a\u5927\u7684\u5de5\u5382\uff0c\u8fdb\u7a0b\u5c31\u50cf\u8fd9\u4e2a\u5de5\u5382\u91cc\u9762\u5206\u5de5\u4e0d\u540c\u7684\u8f66\u95f4\uff08\u6bd4\u5982\u710a\u63a5\u8f66\u95f4\uff0c\u953b\u9020\u8f66\u95f4\uff0c\u5305\u88c5\u8f66\u95f4\uff09\uff0c\u800c\u8fdb\u7a0b\u5c31\u50cf\u662f\u67d0\u4e2a\u8f66\u95f4\u91cc\u9762\u7684\u5de5\u4eba\u6216\u8005\u6d41\u6c34\u7ebf\uff0c\u591a\u4e2a\u5de5\u4eba\u6216\u8005\u591a\u6761\u6d41\u6c34\u7ebf\u4e00\u540c\u5de5\u4f5c\u65f6\u5c31\u4f1a\u5927\u5927\u63d0\u9ad8\u6548\u7387\uff08[\u53c2\u8003\u6587\u7ae0](http:\/\/www.ruanyifeng.com\/blog\/2013\/04\/process",
      "created_at": "2017-11-28 20:12:47",
      "updated_at": "2017-11-28 20:12:47",
      "user": {
        "id": 1,
        "name": "DenverB",
        "email": "851166182@qq.com",
        "created_at": "2017-11-28 20:07:54",
        "url": "http:\/\/blog.app\/storage\/MTUxMTg3MTcwMw==.jpeg",
        "sign": "\u4e0d\u75af\u9b54\uff0c\u4e0d\u6210\u6d3b",
        "key_word": "php laravel web\u5b89\u5168",
        "github": "https:\/\/github.com\/DenverBYF",
        "website": null
      },
      "tag": {
        "id": 2,
        "name": "php",
        "created_at": "2017-11-28 20:12:47"
      }
    },
    {
      "id": 3,
      "user_id": 1,
      "tag_id": 3,
      "view": 0,
      "name": "sqlmap\u4e2d\u7684\u201c\u871c\u7f50\u201d\u5b9e\u9a8c",
      "md_content": "# \u8bb0\u5f55\u4e00\u6b21\u5f88\u6709\u610f\u601d\u7684\u5c0f\u5b9e\u9a8c\r\n       \u524d\u51e0\u5929\u5728freebuf\u4e0a\u770b\u5230\u4e86\u4e00\u7bc7\u5f88\u6709\u610f\u601d\u7684\u6587\u7ae0\uff0c[\u539f\u6587\u94fe\u63a5](http:\/\/www.yilan.io\/article\/5805a294a3dd044f5a2ba81d)\uff0c\u5728\u8fd9\u7bc7\u6587\u7ae0\u4e2d\uff0c\u4f5c\u8005\u8bb2\u4e86\u4e00\u4e2a\u5f88\u6709\u610f\u601d\u7684\u4e8b\u60c5\uff0c\u6211\u4eec\u90fd\u77e5\u9053sqlmap\u662f\u4e00\u4e2a\u6e17\u900f\u6d4b\u8bd5\u7684\u795e\u5668\uff0c\u5f88\u591a\u4eba\u90fd\u4f1a\u4f7f\u7528\u5b83\u6765sql\u6ce8\u5165\uff0c\u4f46\u5982\u679c\u6ca1\u6709\u6ce8\u610f\u770b\u6570\u636e\u4e2d\u7684\u5185",
      "created_at": "2017-11-28 20:13:32",
      "updated_at": "2017-11-28 20:13:32",
      "user": {
        "id": 1,
        "name": "DenverB",
        "email": "851166182@qq.com",
        "created_at": "2017-11-28 20:07:54",
        "url": "http:\/\/blog.app\/storage\/MTUxMTg3MTcwMw==.jpeg",
        "sign": "\u4e0d\u75af\u9b54\uff0c\u4e0d\u6210\u6d3b",
        "key_word": "php laravel web\u5b89\u5168",
        "github": "https:\/\/github.com\/DenverBYF",
        "website": null
      },
      "tag": {
        "id": 3,
        "name": "\u5b89\u5168\u76f8\u5173",
        "created_at": "2017-11-28 20:13:32"
      }
    },
    {
      "id": 4,
      "user_id": 1,
      "tag_id": 4,
      "view": 0,
      "name": "leetcode\u4e2ddatabase\u9898\u89e3",
      "md_content": "## Leetcode\u4e2ddatabase\u6a21\u5757\r\n* \u6bcf\u5929\u66f4\u65b0\u4e00\u9053\u9898\r\n\r\n### Combine Two Tables\r\n* \u9898\u76ee\r\n![](http:\/\/oeix47n80.bkt.clouddn.com\/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202017-11-03%20%E4%B8%8A%E5%8D%888.27.00.png)\r\n* \u63cf\u8ff0\uff1a\u9700\u8981\u4ee5Pers",
      "created_at": "2017-11-28 20:14:09",
      "updated_at": "2017-11-28 20:14:09",
      "user": {
        "id": 1,
        "name": "DenverB",
        "email": "851166182@qq.com",
        "created_at": "2017-11-28 20:07:54",
        "url": "http:\/\/blog.app\/storage\/MTUxMTg3MTcwMw==.jpeg",
        "sign": "\u4e0d\u75af\u9b54\uff0c\u4e0d\u6210\u6d3b",
        "key_word": "php laravel web\u5b89\u5168",
        "github": "https:\/\/github.com\/DenverBYF",
        "website": null
      },
      "tag": {
        "id": 4,
        "name": "\u5b66\u4e60\u8bb0\u5f55",
        "created_at": "2017-11-28 20:14:09"
      }
    },
    {
      "id": 5,
      "user_id": 1,
      "tag_id": 1,
      "view": 0,
      "name": "php\u4e2d\u7684\u5f31\u7c7b\u578b\u6bd4\u8f83",
      "md_content": "## \u5173\u4e8e\u7b49\u53f7\r\n       \u5728\u5927\u591a\u6570\u7f16\u7a0b\u8bed\u8a00\u4e2d\uff0c\u4e00\u4e2a\u7b49\u53f7\u4ee3\u8868\u8d4b\u503c\uff0c\u4e24\u4e2a\u7b49\u53f7\u4ee3\u8868\u7b49\u4e8e\uff0cphp\u4e5f\u662f\u8fd9\u6837\u7684\uff0c\u4f46php\u5374\u8fd8\u6709\u4e00\u4e2a\u4e09\u4e2a\u7b49\u53f7\u3002\u4e09\u4e2a\u7b49\u53f7\u4e5f\u4ee3\u8868\u76f8\u7b49\uff0c\u90a3\u4e48\u4e24\u4e2a\u7b49\u53f7\u548c\u4e09\u4e2a\u7b49\u53f7\u4e4b\u95f4\u6709\u4ec0\u4e48\u4e0d\u540c\u7684\u5462\u3002 \r\n       \u5728php\u4e2d\uff0c\u4f7f\u7528\u4e24\u4e2a\u7b49\u53f7\u6765\u5224\u65ad\u65f6\uff0c\u53ea\u9700\u8981\u4e24\u4e2a\u53d8\u91cf\u7684\u503c\u76f8\u540c\u5373\u53ef\u8fd4\u56detrue\uff0c\u5426\u5219\u8fd4\u56defalse\u3002\u800c\u4f7f\u7528\u4e09",
      "created_at": "2017-11-28 20:14:50",
      "updated_at": "2017-11-28 20:14:50",
      "user": {
        "id": 1,
        "name": "DenverB",
        "email": "851166182@qq.com",
        "created_at": "2017-11-28 20:07:54",
        "url": "http:\/\/blog.app\/storage\/MTUxMTg3MTcwMw==.jpeg",
        "sign": "\u4e0d\u75af\u9b54\uff0c\u4e0d\u6210\u6d3b",
        "key_word": "php laravel web\u5b89\u5168",
        "github": "https:\/\/github.com\/DenverBYF",
        "website": null
      },
      "tag": {
        "id": 1,
        "name": "web\u5b89\u5168",
        "created_at": "2017-11-28 20:12:20"
      }
    },
    {
      "id": 6,
      "user_id": 2,
      "tag_id": 2,
      "view": 0,
      "name": "PDO\u673a\u5236\u5b66\u4e60",
      "md_content": "## \u4ec0\u4e48\u662fPDO\r\n       PDO\uff08PHP\u6570\u636e\u5bf9\u8c61\uff09 \u662f\u4e00\u4e2a\u8f7b\u91cf\u7ea7\u7684\u3001\u5177\u6709\u517c\u5bb9\u63a5\u53e3\u7684PHP\u6570\u636e\u8fde\u63a5\u62d3\u5c55\uff0c\u662fphp\u5b98\u65b9\u7684\u4e00\u4e2a\u5e93\uff0cPDO\u6700\u4e3b\u8981\u7684\u4f18\u70b9\u5c31\u662f\u4e0d\u5c40\u9650\u4e8e\u6570\u636e\u5e93\u7684\u7c7b\u578b\uff0c\u5e76\u4e14\u5bf9\u4e8e\u505a\u5b89\u5168\u5f00\u53d1\u6765\u8bf4\u5417\uff0cPDO\u7684\u5b89\u5168\u6027\u66f4\u52a0\u503c\u5f97\u4fe1\u8d56\u3002\u5e76\u4e14\u5728php6\u4e2d\uff0cPDO\u4e5f\u6210\u4e3a\u4e86\u9ed8\u8ba4\u7684\u4e0emysql\u4ea4\u4e92\u7684\u65b9\u5f0f\u3002\r\n## PDO\u4f7f\u7528\u5b66\u4e60\u8bb0\u5f55\r\n    ",
      "created_at": "2017-11-28 20:15:34",
      "updated_at": "2017-11-28 20:15:34",
      "user": {
        "id": 2,
        "name": "Editor1",
        "email": "18991388969@163.com",
        "created_at": "2017-11-28 20:10:41",
        "url": null,
        "sign": null,
        "key_word": null,
        "github": null,
        "website": null
      },
      "tag": {
        "id": 2,
        "name": "php",
        "created_at": "2017-11-28 20:12:47"
      }
    },
    {
      "id": 7,
      "user_id": 2,
      "tag_id": 4,
      "view": 0,
      "name": "\u300a\u4ee3\u7801\u5ba1\u8ba1\uff0d\uff0d\u4f01\u4e1a\u7ea7web\u5b89\u5168\u6846\u67b6\u300b\u8bfb\u4e66\u7b14\u8bb0",
      "md_content": "       \u597d\u4e45\u597d\u4e45\u6ca1\u6709\u5199\u8fc7\u535a\u5ba2\u4e86\u3002\u3002\u6700\u8fd1\u5b8c\u6574\u7684\u9605\u8bfb\u4e86Seay\u7684\u300a\u4ee3\u7801\u5ba1\u8ba1\uff0d\uff0d\u4f01\u4e1a\u7ea7web\u5b89\u5168\u6846\u67b6\u300b\uff0c\u89c9\u5f97\u53d7\u76ca\u532a\u6d45\uff0c\u505a\u4e2a\u8bb0\u5f55\uff0c\u4ee5\u4fbf\u65e5\u540e\u5b66\u4e60\u3002\r\n# \u4ee3\u7801\u5ba1\u8ba1\u603b\u4f53\u601d\u8def\r\n       1.\u6839\u636e\u654f\u611f\u5173\u952e\u5b57\u56de\u6eaf\u53c2\u6570\u4f20\u9012\u8fc7\u7a0b \r\n       2.\u5bfb\u627e\u53ef\u63a7\u53d8\u91cf\uff0c\u6b63\u5411\u8ffd\u8e2a\u53d8\u91cf\u4f20\u9012\u8fc7\u7a0b ",
      "created_at": "2017-11-28 20:16:21",
      "updated_at": "2017-11-28 20:16:21",
      "user": {
        "id": 2,
        "name": "Editor1",
        "email": "18991388969@163.com",
        "created_at": "2017-11-28 20:10:41",
        "url": null,
        "sign": null,
        "key_word": null,
        "github": null,
        "website": null
      },
      "tag": {
        "id": 4,
        "name": "\u5b66\u4e60\u8bb0\u5f55",
        "created_at": "2017-11-28 20:14:09"
      }
    },
    {
      "id": 8,
      "user_id": 3,
      "tag_id": 2,
      "view": 0,
      "name": "PHP\u722c\u866b\u722c\u53d6Laravel\uff0dchina\u4e2d\u7684\u6587\u7ae0",
      "md_content": "## php\u4e5f\u53ef\u4ee5\u5199\u722c\u866b\r\n* \u8bf4\u8d77\u722c\u866b\uff0c\u5927\u591a\u6570\u7b2c\u4e00\u53cd\u5e94\u90fd\u662fpython\uff0cpython\u5f3a\u5927\u7684requests\u548cbs4\u7b49\u7b49\u5f3a\u5927\u7684\u7b2c\u4e09\u65b9\u5e93\u8ba9\u4eba\u4eec\u90fd\u559c\u6b22\u7528python\u53bb\u5199\u722c\u866b\u3002\u4f46\u662fphp\u4f5c\u4e3a\u201c\u4e16\u754c\u4e0a\u6700\u597d\u7684\u8bed\u8a00\u201d\u5f53\u7136\u4e5f\u53ef\u4ee5\u7528\u6765\u5f00\u53d1\u722c\u866b\u3002 \r\n* \u5199\u4e86\u4e00\u4e2a\u5c0f\u7684\u722c\u866b\u722c\u53d6\u793e\u533a\u7684\u6587\u7ae0[\u6e90\u7801\u5730\u5740](https:\/\/github.com\/DenverBYF\/php_spider)\r\n\r\n## \u524d\u671f\u51c6\u5907\r\n* com",
      "created_at": "2017-11-28 20:17:10",
      "updated_at": "2017-11-28 20:17:10",
      "user": {
        "id": 3,
        "name": "Editor2",
        "email": "denverb097@gmail.com",
        "created_at": "2017-11-28 20:11:31",
        "url": null,
        "sign": null,
        "key_word": null,
        "github": null,
        "website": null
      },
      "tag": {
        "id": 2,
        "name": "php",
        "created_at": "2017-11-28 20:12:47"
      }
    },
    {
      "id": 9,
      "user_id": 3,
      "tag_id": 6,
      "view": 0,
      "name": "laravel\u6784\u5efaRestful\u89c4\u8303api",
      "md_content": "#\u73af\u5883\u914d\u7f6e\r\n##\u5b89\u88c5dingo\/api\u548cJWT\r\n* \u901a\u8fc7composer require\u6216\u8005\u5728\u9879\u76eecomposer.json\u6dfb\u52a0required\u5b89\u88c5\u5373\u53ef\u3002\r\n\r\n##\u73af\u5883\u914d\u7f6e\r\n* dingo\/api \r\n \u5728config\/app.php\u4e2d\u7684providers\u6570\u7ec4\u4e2d\u6dfb\u52a0 `Dingo\\Api\\Provider\\LaravelServiceProvider::class` \r\n \u8fd0\u884c` ",
      "created_at": "2017-11-28 20:17:37",
      "updated_at": "2017-11-28 20:17:37",
      "user": {
        "id": 3,
        "name": "Editor2",
        "email": "denverb097@gmail.com",
        "created_at": "2017-11-28 20:11:31",
        "url": null,
        "sign": null,
        "key_word": null,
        "github": null,
        "website": null
      },
      "tag": {
        "id": 6,
        "name": "laravel",
        "created_at": "2017-11-28 20:17:37"
      }
    },
    {
      "id": 10,
      "user_id": 3,
      "tag_id": 1,
      "view": 0,
      "name": "ssrf",
      "md_content": "#SSRF\u7b80\u4ecb\r\n       SSRF(Server-side Request Forge, \u670d\u52a1\u7aef\u8bf7\u6c42\u4f2a\u9020)\u3002\u653b\u51fb\u8005\u5229\u7528\u4e00\u4e2a\u80fd\u591f\u53d1\u8d77\u7f51\u7edc\u8bf7\u6c42\u7684\u670d\u52a1\uff0c\u5229\u7528\u5176\u4f5c\u4e3a\u4e2d\u95f4\u8df3\u677f\u8fdb\u884c\u653b\u51fb\u3002\u5b83\u7684\u653b\u51fb\u76ee\u6807\u4e00\u822c\u90fd\u662f\u4e0e\u5916\u7f51\u76f8\u65e0\u6cd5\u8bbf\u95ee\u7684\u5185\u7f51\u73af\u5883\uff0c\u591a\u6570\u60c5\u51b5\u4e0b\uff0c\u653b\u51fb\u8005\u53ef\u5229\u7528web\u7aef\u7684ssrf\u6f0f\u6d1e\u6765\u6e17\u900f\u8fdb\u539f\u672c\u5e94\u4e0e\u5916\u7f51\u9694\u79bb\u7684\u5185\u7f51\u73af\u5883\u3002\u8fdb\u884c\u5185\u7f51\u626b\u9762\u63a2\u6d4b\uff0c\u751a\u81f3\u5229\u7528\u4e00\u4e9b\u670d\u52a1\u6765getshel",
      "created_at": "2017-11-28 20:18:05",
      "updated_at": "2017-11-28 20:18:05",
      "user": {
        "id": 3,
        "name": "Editor2",
        "email": "denverb097@gmail.com",
        "created_at": "2017-11-28 20:11:31",
        "url": null,
        "sign": null,
        "key_word": null,
        "github": null,
        "website": null
      },
      "tag": {
        "id": 1,
        "name": "web\u5b89\u5168",
        "created_at": "2017-11-28 20:12:20"
      }
    }
  ],
  "first_page_url": "http:\/\/blog.app\/articles?page=1",
  "from": 1,
  "last_page": 2,
  "last_page_url": "http:\/\/blog.app\/articles?page=2",
  "next_page_url": "http:\/\/blog.app\/articles?page=2",
  "path": "http:\/\/blog.app\/articles",
  "per_page": 10,
  "prev_page_url": null,
  "to": 10,
  "total": 11
}
```
* 说明：涉及文章时会采用分页数据传输，主要数据信息说明详情如下：  
 * current_page:当前页数
 * data:数据  
   id:文章唯一id  
   view:浏览量  
   name:标题  
   md_content:文章内容（markdown格式，具体转换和现实方法见后文）,除文章的show页面外，其余页面数据皆为截取了文章前200个字符的内容.  
   created_at:创建时间  
   updated_at:最新修改时间  
   user:文章作者信息（详细参数见作者模块）  
   tag:文章标签信息（详细参数见标签模块）
 * first_page_url:第一页链接
 * last_page:最后一页
 * last_page_url:最后一页链接
 * next_page_url下一页链接
 * path:主页链接
 * per_page:每页数据数
 * prev_page_url:上一页链接
 
#### show
* url:http://blog.app/articles/{id}
* type:get
* param:id (文章唯一id) 
* data:  
```
{
  "id": 2,
  "user_id": 1,
  "tag_id": 2,
  "view": 0,
  "name": "php\u4e2d\u7684\u591a\u8fdb\u7a0b",
  "md_content": "# \u8fdb\u7a0b\u4e0e\u7ebf\u7a0b \r\n       \u770b\u8fc7\u4e00\u4e2a\u5f88\u5f62\u8c61\u7684\u6bd4\u55bb\uff0c\u4e00\u4e2a\u8f6f\u4ef6\u6216\u8005\u7a0b\u5e8f\u5c31\u50cf\u4e00\u4e2a\u5927\u7684\u5de5\u5382\uff0c\u8fdb\u7a0b\u5c31\u50cf\u8fd9\u4e2a\u5de5\u5382\u91cc\u9762\u5206\u5de5\u4e0d\u540c\u7684\u8f66\u95f4\uff08\u6bd4\u5982\u710a\u63a5\u8f66\u95f4\uff0c\u953b\u9020\u8f66\u95f4\uff0c\u5305\u88c5\u8f66\u95f4\uff09\uff0c\u800c\u8fdb\u7a0b\u5c31\u50cf\u662f\u67d0\u4e2a\u8f66\u95f4\u91cc\u9762\u7684\u5de5\u4eba\u6216\u8005\u6d41\u6c34\u7ebf\uff0c\u591a\u4e2a\u5de5\u4eba\u6216\u8005\u591a\u6761\u6d41\u6c34\u7ebf\u4e00\u540c\u5de5\u4f5c\u65f6\u5c31\u4f1a\u5927\u5927\u63d0\u9ad8\u6548\u7387\uff08[\u53c2\u8003\u6587\u7ae0](http:\/\/www.ruanyifeng.com\/blog\/2013\/04\/processes_and_threads.html)\uff09\u3002\u6240\u4ee5\u5f53\u6211\u4eec\u7684\u7a0b\u5e8f\u9700\u8981\u5904\u7406\u5927\u91cf\u7684\u4e8b\u52a1\u65f6\uff0c\u591a\u7ebf\u7a0b\u6216\u8005\u591a\u8fdb\u7a0b\u5c31\u53d8\u5f97\u5341\u5206\u5fc5\u8981\u4e86\u3002 \r\n# PHP\u4e2d\u7684\u591a\u8fdb\u7a0b\r\n       PHP\u4e2d\u8fdb\u7a0b\u65f6\u4e0d\u652f\u6301\u591a\u7ebf\u7a0b\u7684\uff0c\u4f46\u6211\u4eec\u53ef\u4ee5\u4f7f\u7528\u591a\u8fdb\u7a0b\u6765\u4ee3\u66ff\u8fd9\u4e2a\u529f\u80fd\uff0c\u4f18\u5316\u6211\u4eec\u7684\u7a0b\u5e8f\u3002\u9996\u5148\uff0cPHP\u4e2d\u591a\u8fdb\u7a0b\u7684\u89c6\u7ebf\u4f9d\u8d56\u4e8epcntl\u548cposix\u4e24\u4e2a\u6269\u5c55\uff0c\u53ef\u4ee5\u4f7f\u7528php \uff0dm\u67e5\u770b\u662f\u5426\u6709\u8fd9\u4e24\u4e2a\u6269\u5c55\u3002\u5982\u679c\u6ca1\u6709\uff0c\u53ef\u4ee5\u81ea\u884c\u5b89\u88c5\u3002 \r\n## \u5f00\u542f\u591a\u8fdb\u7a0b\r\n       PHP\u4e2d\u7684pcntl_fork()\u51fd\u6570\u53ef\u4ee5\u521b\u5efa\u4e00\u4e2a\u5b50\u8fdb\u7a0b\uff0c\u5f53\u6267\u884c\u5b8c\u8fd9\u4e2a\u51fd\u6570\u4e2d\uff0c\u7a0b\u5e8f\u5c31\u4e00\u5206\u4e3a\u4e8c\uff0c\u4e00\u4e2a\u7a0b\u5e8f\u7684pid\u503c\u4e3a0\uff0c\u8fd9\u4e2a\u7a0b\u5e8f\u5c31\u662f\u5b50\u8fdb\u7a0b\uff1b\u53e6\u4e00\u4e2a\u7a0b\u5e8f\u7684pid\u503c\u5927\u4e8e0\uff08\u5e76\u4e14\u7b49\u4e8e\u5b50\u8fdb\u7a0bpid\u503c\uff09\uff0c\u8fd9\u4e2a\u7a0b\u5e8f\u5c31\u662f\u7236\u8fdb\u7a0b\u6211\u4eec\u4f7f\u7528pcntl_wait()\u51fd\u6570\u53ef\u4ee5\u5c06\u7236\u8fdb\u7a0b\u6302\u8d77\uff0c\u77e5\u9053\u5b50\u8fdb\u7a0b\u90fd\u63a8\u51fa\u4e3a\u6b62\uff0c\u8fd9\u6837\u5c31\u53ef\u4ee5\u9632\u6b62\u50f5\u5c38\u8fdb\u7a0b\u7684\u51fa\u73b0\u3002\u4e3e\u4e2a\u4f8b\u5b50\uff1a \r\n \u6211\u4eec\u8fd0\u884c\u7a0b\u5e8f(__\u6ce8\uff1apcntl_fork()\u4e0d\u80fd\u5728apache\u4e0a\u4f7f\u7528\uff0c\u6211\u4eec\u53ef\u4ee5\u5728CGI\u6a21\u5f0f\u6216\u8005\u547d\u4ee4\u884c\u4e0b\u6267\u884cph__p)\u53ef\u4ee5\u770b\u5230\u7ed3\u679c\uff1a \r\n![](http:\/\/oeix47n80.bkt.clouddn.com\/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-11-02%20%E4%B8%8B%E5%8D%889.05.03.png) \r\n       \u53ef\u4ee5\u770b\u5230\uff0c\u6211\u4eec\u6210\u529f\u521b\u5efa\u4e86\u4e00\u4e2a\u5b50\u8fdb\u7a0b\u3002\u540e\u7eed\u4f1a\u518d\u5b66\u4e60\u5982\u4f55\u5728\u8fdb\u7a0b\u95f4\u76f8\u4e92\u901a\u4fe1\u3002",
  "created_at": "2017-11-28 20:12:47",
  "updated_at": "2017-11-28 20:12:47",
  "user": {
    "id": 1,
    "name": "DenverB",
    "email": "851166182@qq.com",
    "created_at": "2017-11-28 20:07:54",
    "url": "http:\/\/blog.app\/storage\/MTUxMTg3MTcwMw==.jpeg",
    "sign": "\u4e0d\u75af\u9b54\uff0c\u4e0d\u6210\u6d3b",
    "key_word": "php laravel web\u5b89\u5168",
    "github": "https:\/\/github.com\/DenverBYF",
    "website": null
  },
  "tag": {
    "id": 2,
    "name": "php",
    "created_at": "2017-11-28 20:12:47"
  }
}
```
* 说明：同上的data部分
### 作者
#### index
* url:http://blog.app/users
* type:get
* param:无
* data:  
```
[
  {
    "id": 1,
    "name": "DenverB",
    "email": "851166182@qq.com",
    "created_at": "2017-11-28 20:07:54",
    "url": "http:\/\/blog.app\/storage\/MTUxMTg3MTcwMw==.jpeg",
    "sign": "\u4e0d\u75af\u9b54\uff0c\u4e0d\u6210\u6d3b",
    "key_word": "php laravel web\u5b89\u5168",
    "github": "https:\/\/github.com\/DenverBYF",
    "website": null
  },
  {
    "id": 2,
    "name": "Editor1",
    "email": "18991388969@163.com",
    "created_at": "2017-11-28 20:10:41",
    "url": null,
    "sign": null,
    "key_word": null,
    "github": null,
    "website": null
  },
  {
    "id": 3,
    "name": "Editor2",
    "email": "denverb097@gmail.com",
    "created_at": "2017-11-28 20:11:31",
    "url": null,
    "sign": null,
    "key_word": null,
    "github": null,
    "website": null
  }
]
```
* 说明:id：(作者唯一id) name:名称 emial:邮箱 url:头像地址 created_at:加入时间 sign：个性签名 key_word:关键词 github:github website:个人主页
#### show
* url:http://blog.app/users/{id}
* type:get
* param:id(作者唯一id)
* data:  
```
{
  "userInfo": {
    "id": 2,
    "name": "Editor1",
    "email": "18991388969@163.com",
    "created_at": "2017-11-28 20:10:41",
    "url": null,
    "sign": null,
    "key_word": null,
    "github": null,
    "website": null
  },
  "articles": {
    "current_page": 1,
    "data": [
      {
        "id": 6,
        "user_id": 2,
        "tag_id": 2,
        "view": 0,
        "name": "PDO\u673a\u5236\u5b66\u4e60",
        "md_content": "## \u4ec0\u4e48\u662fPDO\r\n       PDO\uff08PHP\u6570\u636e\u5bf9\u8c61\uff09 \u662f\u4e00\u4e2a\u8f7b\u91cf\u7ea7\u7684\u3001\u5177\u6709\u517c\u5bb9\u63a5\u53e3\u7684PHP\u6570\u636e\u8fde\u63a5\u62d3\u5c55\uff0c\u662fphp\u5b98\u65b9\u7684\u4e00\u4e2a\u5e93\uff0cPDO\u6700\u4e3b\u8981\u7684\u4f18\u70b9\u5c31\u662f\u4e0d\u5c40\u9650\u4e8e\u6570\u636e\u5e93\u7684\u7c7b\u578b\uff0c\u5e76\u4e14\u5bf9\u4e8e\u505a\u5b89\u5168\u5f00\u53d1\u6765\u8bf4\u5417\uff0cPDO\u7684\u5b89\u5168\u6027\u66f4\u52a0\u503c\u5f97\u4fe1\u8d56\u3002\u5e76\u4e14\u5728php6\u4e2d\uff0cPDO\u4e5f\u6210\u4e3a\u4e86\u9ed8\u8ba4\u7684\u4e0emysql\u4ea4\u4e92\u7684\u65b9\u5f0f\u3002\r\n## PDO\u4f7f\u7528\u5b66\u4e60\u8bb0\u5f55\r\n    ",
        "created_at": "2017-11-28 20:15:34",
        "updated_at": "2017-11-28 20:15:34",
        "tag": {
          "id": 2,
          "name": "php",
          "created_at": "2017-11-28 20:12:47"
        }
      },
      {
        "id": 7,
        "user_id": 2,
        "tag_id": 4,
        "view": 0,
        "name": "\u300a\u4ee3\u7801\u5ba1\u8ba1\uff0d\uff0d\u4f01\u4e1a\u7ea7web\u5b89\u5168\u6846\u67b6\u300b\u8bfb\u4e66\u7b14\u8bb0",
        "md_content": "       \u597d\u4e45\u597d\u4e45\u6ca1\u6709\u5199\u8fc7\u535a\u5ba2\u4e86\u3002\u3002\u6700\u8fd1\u5b8c\u6574\u7684\u9605\u8bfb\u4e86Seay\u7684\u300a\u4ee3\u7801\u5ba1\u8ba1\uff0d\uff0d\u4f01\u4e1a\u7ea7web\u5b89\u5168\u6846\u67b6\u300b\uff0c\u89c9\u5f97\u53d7\u76ca\u532a\u6d45\uff0c\u505a\u4e2a\u8bb0\u5f55\uff0c\u4ee5\u4fbf\u65e5\u540e\u5b66\u4e60\u3002\r\n# \u4ee3\u7801\u5ba1\u8ba1\u603b\u4f53\u601d\u8def\r\n       1.\u6839\u636e\u654f\u611f\u5173\u952e\u5b57\u56de\u6eaf\u53c2\u6570\u4f20\u9012\u8fc7\u7a0b \r\n       2.\u5bfb\u627e\u53ef\u63a7\u53d8\u91cf\uff0c\u6b63\u5411\u8ffd\u8e2a\u53d8\u91cf\u4f20\u9012\u8fc7\u7a0b ",
        "created_at": "2017-11-28 20:16:21",
        "updated_at": "2017-11-28 20:16:21",
        "tag": {
          "id": 4,
          "name": "\u5b66\u4e60\u8bb0\u5f55",
          "created_at": "2017-11-28 20:14:09"
        }
      }
    ],
    "first_page_url": "http:\/\/blog.app\/users\/2?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/blog.app\/users\/2?page=1",
    "next_page_url": null,
    "path": "http:\/\/blog.app\/users\/2",
    "per_page": 10,
    "prev_page_url": null,
    "to": 2,
    "total": 2
  }
}
```
* 说明：userInfo:作者信息（输入同上index） articles:作者文章（数据同文章但无user）

### 标签
#### index
* url: http://blog.app/tags
* type:get
* param:无
* data:  
```
[
  {
    "id": 1,
    "name": "web\u5b89\u5168",
    "created_at": "2017-11-28 20:12:20"
  },
  {
    "id": 2,
    "name": "php",
    "created_at": "2017-11-28 20:12:47"
  },
  {
    "id": 3,
    "name": "\u5b89\u5168\u76f8\u5173",
    "created_at": "2017-11-28 20:13:32"
  },
  {
    "id": 4,
    "name": "\u5b66\u4e60\u8bb0\u5f55",
    "created_at": "2017-11-28 20:14:09"
  },
  {
    "id": 5,
    "name": "\u5b66\u4e60",
    "created_at": "2017-11-28 20:15:58"
  },
  {
    "id": 6,
    "name": "laravel",
    "created_at": "2017-11-28 20:17:37"
  }
]
```
* 说明： id（标签唯一id） name：名称

#### show
* url:http://blog.app/tags/{id}
* type:get
* param:id(标签唯一id)
* data:  
```
{
  "tagInfo": {
    "id": 1,
    "name": "web\u5b89\u5168",
    "created_at": "2017-11-28 20:12:20"
  },
  "articles": {
    "current_page": 1,
    "data": [
      {
        "id": 1,
        "user_id": 1,
        "tag_id": 1,
        "view": 0,
        "name": "PHP\u4e2d\u53cd\u5e8f\u5217\u5316\u5f15\u8d77\u7684\u5b89\u5168\u95ee\u9898",
        "md_content": "# php\u4e2d\u7684\u7c7b\u4e0e\u5e8f\u5217\u5316\r\n       \u548c\u5176\u4ed6\u9762\u5411\u5bf9\u8c61\u7684\u8bed\u8a00\u4e00\u6837\uff0cphp\u4e2d\u4e5f\u53ef\u4ee5\u901a\u8fc7\u7c7b\u7684\u65b9\u5f0f\u6765\u5c01\u88c5\u4e00\u4e9b\u53d8\u91cf\u548c\u65b9\u6cd5\uff0c\u901a\u8fc7\u7c7b\u7684\u5b9a\u4e49\u53ef\u4ee5\u4f7f\u6211\u4eec\u7684\u7a0b\u5e8f\u53d8\u5f97\u66f4\u52a0\u7b80\u6d01\u548c\u65b9\u4fbf\u3002\u800c\u5e8f\u5217\u5316\u7684\u4e00\u5927\u4e3b\u8981\u7528\u9014\u5c31\u662f\u5e8f\u5217\u5316\u4e00\u4e2a\u7c7b\u5bf9\u8c61\uff0c\u8ba9\u5b83\u53d8\u6210\u4e00\u4e2a\u5b57\u7b26\u4e32\u5f62\u5f0f\uff0c\u4f7f\u5f97\u6570\u636e\u65b9\u4fbf\u4f20\u8f93\u548c\u50a8\u5b58\uff0c\u4e3e\u4e2a\u4f8b\u5b50\u3002 \r\n![](http:\/\/oeix47n80.bkt.clouddn.com\/%E5%B1",
        "created_at": "2017-11-28 20:12:20",
        "updated_at": "2017-11-28 20:12:20",
        "user": {
          "id": 1,
          "name": "DenverB",
          "email": "851166182@qq.com",
          "created_at": "2017-11-28 20:07:54",
          "url": "http:\/\/blog.app\/storage\/MTUxMTg3MTcwMw==.jpeg",
          "sign": "\u4e0d\u75af\u9b54\uff0c\u4e0d\u6210\u6d3b",
          "key_word": "php laravel web\u5b89\u5168",
          "github": "https:\/\/github.com\/DenverBYF",
          "website": null
        }
      },
      {
        "id": 5,
        "user_id": 1,
        "tag_id": 1,
        "view": 0,
        "name": "php\u4e2d\u7684\u5f31\u7c7b\u578b\u6bd4\u8f83",
        "md_content": "## \u5173\u4e8e\u7b49\u53f7\r\n       \u5728\u5927\u591a\u6570\u7f16\u7a0b\u8bed\u8a00\u4e2d\uff0c\u4e00\u4e2a\u7b49\u53f7\u4ee3\u8868\u8d4b\u503c\uff0c\u4e24\u4e2a\u7b49\u53f7\u4ee3\u8868\u7b49\u4e8e\uff0cphp\u4e5f\u662f\u8fd9\u6837\u7684\uff0c\u4f46php\u5374\u8fd8\u6709\u4e00\u4e2a\u4e09\u4e2a\u7b49\u53f7\u3002\u4e09\u4e2a\u7b49\u53f7\u4e5f\u4ee3\u8868\u76f8\u7b49\uff0c\u90a3\u4e48\u4e24\u4e2a\u7b49\u53f7\u548c\u4e09\u4e2a\u7b49\u53f7\u4e4b\u95f4\u6709\u4ec0\u4e48\u4e0d\u540c\u7684\u5462\u3002 \r\n       \u5728php\u4e2d\uff0c\u4f7f\u7528\u4e24\u4e2a\u7b49\u53f7\u6765\u5224\u65ad\u65f6\uff0c\u53ea\u9700\u8981\u4e24\u4e2a\u53d8\u91cf\u7684\u503c\u76f8\u540c\u5373\u53ef\u8fd4\u56detrue\uff0c\u5426\u5219\u8fd4\u56defalse\u3002\u800c\u4f7f\u7528\u4e09",
        "created_at": "2017-11-28 20:14:50",
        "updated_at": "2017-11-28 20:14:50",
        "user": {
          "id": 1,
          "name": "DenverB",
          "email": "851166182@qq.com",
          "created_at": "2017-11-28 20:07:54",
          "url": "http:\/\/blog.app\/storage\/MTUxMTg3MTcwMw==.jpeg",
          "sign": "\u4e0d\u75af\u9b54\uff0c\u4e0d\u6210\u6d3b",
          "key_word": "php laravel web\u5b89\u5168",
          "github": "https:\/\/github.com\/DenverBYF",
          "website": null
        }
      },
      {
        "id": 10,
        "user_id": 3,
        "tag_id": 1,
        "view": 0,
        "name": "ssrf",
        "md_content": "#SSRF\u7b80\u4ecb\r\n       SSRF(Server-side Request Forge, \u670d\u52a1\u7aef\u8bf7\u6c42\u4f2a\u9020)\u3002\u653b\u51fb\u8005\u5229\u7528\u4e00\u4e2a\u80fd\u591f\u53d1\u8d77\u7f51\u7edc\u8bf7\u6c42\u7684\u670d\u52a1\uff0c\u5229\u7528\u5176\u4f5c\u4e3a\u4e2d\u95f4\u8df3\u677f\u8fdb\u884c\u653b\u51fb\u3002\u5b83\u7684\u653b\u51fb\u76ee\u6807\u4e00\u822c\u90fd\u662f\u4e0e\u5916\u7f51\u76f8\u65e0\u6cd5\u8bbf\u95ee\u7684\u5185\u7f51\u73af\u5883\uff0c\u591a\u6570\u60c5\u51b5\u4e0b\uff0c\u653b\u51fb\u8005\u53ef\u5229\u7528web\u7aef\u7684ssrf\u6f0f\u6d1e\u6765\u6e17\u900f\u8fdb\u539f\u672c\u5e94\u4e0e\u5916\u7f51\u9694\u79bb\u7684\u5185\u7f51\u73af\u5883\u3002\u8fdb\u884c\u5185\u7f51\u626b\u9762\u63a2\u6d4b\uff0c\u751a\u81f3\u5229\u7528\u4e00\u4e9b\u670d\u52a1\u6765getshel",
        "created_at": "2017-11-28 20:18:05",
        "updated_at": "2017-11-28 20:18:05",
        "user": {
          "id": 3,
          "name": "Editor2",
          "email": "denverb097@gmail.com",
          "created_at": "2017-11-28 20:11:31",
          "url": null,
          "sign": null,
          "key_word": null,
          "github": null,
          "website": null
        }
      },
      {
        "id": 11,
        "user_id": 1,
        "tag_id": 1,
        "view": 0,
        "name": "web\u5b89\u5168\u603b\u7ed3\uff0d\uff0dSQL\u6ce8\u5165",
        "md_content": "# \u603b\u8ff0\r\n       SQL\u6ce8\u5165\u6f0f\u6d1e\u4e00\u76f4\u662f\u4e3aWeb\u5b89\u5168\u4e2d\u6700\u5e38\u89c1\u4e5f\u662f\u5371\u9669\u5341\u5206\u5927\u7684\u6f0f\u6d1e\u3002\u4ece\u5f00\u5b66\u5230\u73b0\u5728\u4e00\u76f4\u5728\u5b66\u4e60SQL\u6ce8\u5165\u7684\u76f8\u5173\u5185\u5bb9\uff0c\u5728\u8fd9\u91cc\u505a\u4e00\u4e2a\u5c0f\u7ed3\u548c\u6e29\u4e60\u3002 \r\n       SQL\u6ce8\u5165\u7684\u5b66\u4e60\u6709\u5f88\u591a\u5f88\u597d\u7684\u76f8\u5173\u5e73\u53f0\uff0c\u6bd4\u8f83\u5e38\u89c1\u7684\u662fsqli\uff0dlabs\uff08\u6e90\u7801\u53ef\u4ee5\u5728Github \u4e0a\u4e0b\u8f7d\u4e4b\u540e\u8fdb\u884c\u5b89\u88c5\u5373\u53ef\uff09\uff0csqlol\uff08\u8fd9\u4e5f\u662f\u4e00\u4e2a",
        "created_at": "2017-11-28 20:19:04",
        "updated_at": "2017-11-28 20:19:04",
        "user": {
          "id": 1,
          "name": "DenverB",
          "email": "851166182@qq.com",
          "created_at": "2017-11-28 20:07:54",
          "url": "http:\/\/blog.app\/storage\/MTUxMTg3MTcwMw==.jpeg",
          "sign": "\u4e0d\u75af\u9b54\uff0c\u4e0d\u6210\u6d3b",
          "key_word": "php laravel web\u5b89\u5168",
          "github": "https:\/\/github.com\/DenverBYF",
          "website": null
        }
      }
    ],
    "first_page_url": "http:\/\/blog.app\/tags\/1?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/blog.app\/tags\/1?page=1",
    "next_page_url": null,
    "path": "http:\/\/blog.app\/tags\/1",
    "per_page": 10,
    "prev_page_url": null,
    "to": 4,
    "total": 4
  }
}
```
* 说明：tagInfo:作者信息（输入同上index） articles:作者文章（数据同文章但无tag）

### markdown转换问题
* 可用第三方库[editor.md](https://github.com/pandao/editor.md)，或者其他好看的markdown转换渲染的前端库都可以，具体前端自己定就ok。