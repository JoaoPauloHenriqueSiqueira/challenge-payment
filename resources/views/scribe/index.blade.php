<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .php-example code { display: none; }
            </style>

    <script>
        var baseUrl = "http://localhost";
        var useCsrf = Boolean(1);
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("vendor/scribe/js/tryitout-3.24.1.js") }}"></script>

    <script src="{{ asset("vendor/scribe/js/theme-default-3.24.1.js") }}"></script>

</head>

<body data-languages="[&quot;php&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("vendor/scribe/images/navbar.png") }}" alt="navbar-image" />
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="php">php</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                                                                            <ul id="tocify-header-0" class="tocify-header">
                    <li class="tocify-item level-1" data-unique="introduction">
                        <a href="#introduction">Introduction</a>
                    </li>
                                            
                                                                    </ul>
                                                <ul id="tocify-header-1" class="tocify-header">
                    <li class="tocify-item level-1" data-unique="authenticating-requests">
                        <a href="#authenticating-requests">Authenticating requests</a>
                    </li>
                                            
                                                </ul>
                    
                    <ul id="tocify-header-2" class="tocify-header">
                <li class="tocify-item level-1" data-unique="transaction-endpoints">
                    <a href="#transaction-endpoints">Transaction endpoints</a>
                </li>
                                    <ul id="tocify-subheader-transaction-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="transaction-endpoints-POSTapi-pay">
                        <a href="#transaction-endpoints-POSTapi-pay">Amount a quantity to logged user&#039;s wallet.</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-3" class="tocify-header">
                <li class="tocify-item level-1" data-unique="auth-endpoints">
                    <a href="#auth-endpoints">Auth endpoints</a>
                </li>
                                    <ul id="tocify-subheader-auth-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="auth-endpoints-POSTapi-logout">
                        <a href="#auth-endpoints-POSTapi-logout">Log the user out of the application.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="auth-endpoints-POSTapi-register">
                        <a href="#auth-endpoints-POSTapi-register">Handle a registration request for the application.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="auth-endpoints-POSTapi-login">
                        <a href="#auth-endpoints-POSTapi-login">Handle a login request to the application.</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-4" class="tocify-header">
                <li class="tocify-item level-1" data-unique="user-endpoints">
                    <a href="#user-endpoints">User endpoints</a>
                </li>
                                    <ul id="tocify-subheader-user-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="user-endpoints-PUTapi-profile">
                        <a href="#user-endpoints-PUTapi-profile">Handle a registration request for the application.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="user-endpoints-GETapi-users">
                        <a href="#user-endpoints-GETapi-users">Paginate users according same parameters get</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="user-endpoints-GETapi-users--id-">
                        <a href="#user-endpoints-GETapi-users--id-">GET user according $id</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="user-endpoints-DELETEapi-profile">
                        <a href="#user-endpoints-DELETEapi-profile">Delete the user logged.</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-5" class="tocify-header">
                <li class="tocify-item level-1" data-unique="wallet-endpoints">
                    <a href="#wallet-endpoints">Wallet endpoints</a>
                </li>
                                    <ul id="tocify-subheader-wallet-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="wallet-endpoints-POSTapi-deposit">
                        <a href="#wallet-endpoints-POSTapi-deposit">Amount a quantity to logged user&#039;s wallet.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="wallet-endpoints-GETapi-wallet">
                        <a href="#wallet-endpoints-GETapi-wallet">Show logged user&#039;s wallet.</a>
                    </li>
                                                    </ul>
                            </ul>
        
                        
            </div>

            <ul class="toc-footer" id="toc-footer">
                            <li><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
                    </ul>
        <ul class="toc-footer" id="last-updated">
        <li>Last updated: March 12 2022</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>
<blockquote>
<p>Base URL</p>
</blockquote>
<pre><code class="language-yaml">http://localhost</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is authenticated by sending an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_AUTH_KEY}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.</p>

        <h1 id="transaction-endpoints">Transaction endpoints</h1>

    

            <h2 id="transaction-endpoints-POSTapi-pay">Amount a quantity to logged user&#039;s wallet.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-pay">
<blockquote>Example request:</blockquote>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost/api/pay',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'amount' =&gt; 98.51,
            'payee' =&gt; 'ads14c11-eaf2-49a5-ad5d-70b2d3de590b',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-pay">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;payload&quot;: {
        &quot;value&quot;: &quot;R$98.51&quot;,
        &quot;payer&quot;: &quot;d0b14c11-eaf2-49a5-ad5d-70b2d3de590b&quot;,
        &quot;payee&quot;: &quot;ads14c11-eaf2-49a5-ad5d-70b2d3de590b&quot;
    },
    &quot;message&quot;: &quot;Valor pago com sucesso. Enviamos uma notifica&ccedil;&atilde;o para o(a) Sr(a). Jos&eacute;&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Validation error):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;The given data was invalid.&quot;,
    &quot;errors&quot;: {
        &quot;amount&quot;: [
            &quot;Necess&aacute;rio informar o valor(amount) a ser pago&quot;
        ]
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Wallet not found):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;The given data was invalid.&quot;,
    &quot;errors&quot;: {
        &quot;payee&quot;: [
            &quot;Carteira n&atilde;o encontrada em nossa base&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-pay" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-pay"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-pay"></code></pre>
</span>
<span id="execution-error-POSTapi-pay" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-pay"></code></pre>
</span>
<form id="form-POSTapi-pay" data-method="POST"
      data-path="api/pay"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-pay', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-pay"
                    onclick="tryItOut('POSTapi-pay');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-pay"
                    onclick="cancelTryOut('POSTapi-pay');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-pay" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/pay</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-pay" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-pay"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>amount</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
                <input type="number"
               name="amount"
               data-endpoint="POSTapi-pay"
               value="98.51"
               data-component="body" hidden>
    <br>
<p>Amount to deposit.</p>
        </p>
                <p>
            <b><code>payee</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="payee"
               data-endpoint="POSTapi-pay"
               value="ads14c11-eaf2-49a5-ad5d-70b2d3de590b"
               data-component="body" hidden>
    <br>
<p>Payee (wallet's user to receive the money).</p>
        </p>
        </form>

        <h1 id="auth-endpoints">Auth endpoints</h1>

    

            <h2 id="auth-endpoints-POSTapi-logout">Log the user out of the application.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-logout">
<blockquote>Example request:</blockquote>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost/api/logout',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-logout">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Deslogado com sucesso.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (400, Unauthenticated):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-logout"></code></pre>
</span>
<span id="execution-error-POSTapi-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-logout"></code></pre>
</span>
<form id="form-POSTapi-logout" data-method="POST"
      data-path="api/logout"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-logout"
                    onclick="tryItOut('POSTapi-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-logout"
                    onclick="cancelTryOut('POSTapi-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-logout" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/logout</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-logout" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-logout"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="auth-endpoints-POSTapi-register">Handle a registration request for the application.</h2>

<p>
</p>



<span id="example-requests-POSTapi-register">
<blockquote>Example request:</blockquote>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost/api/register',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'Gabriel Mendes',
            'email' =&gt; 'gabriel@gmail.com.br',
            'password' =&gt; '123456',
            'cpf' =&gt; '948.305.030-84',
            'password_confirmation' =&gt; '123456',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-register">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;user&quot;: {
        &quot;name&quot;: &quot;Jos&eacute;&quot;,
        &quot;email&quot;: &quot;jose@gmail.com&quot;,
        &quot;cpf&quot;: &quot;412.260.118-28&quot;,
        &quot;is_shopkeeper&quot;: &quot;1&quot;,
        &quot;updated_at&quot;: &quot;2022-03-11T13:31:19.000000Z&quot;,
        &quot;created_at&quot;: &quot;2022-03-11T13:31:19.000000Z&quot;,
        &quot;id&quot;: 4
    },
    &quot;token&quot;: &quot;4|mRXLMJGW4JX7ySXqEmiOO2C0kVQQQg7ba15CYKHi&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Validation error):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;The given data was invalid.&quot;,
    &quot;errors&quot;: {
        &quot;email&quot;: [
            &quot;The email field is required.&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-register"></code></pre>
</span>
<span id="execution-error-POSTapi-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-register"></code></pre>
</span>
<form id="form-POSTapi-register" data-method="POST"
      data-path="api/register"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-register"
                    onclick="tryItOut('POSTapi-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-register"
                    onclick="cancelTryOut('POSTapi-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-register" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/register</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-register"
               value="Gabriel Mendes"
               data-component="body" hidden>
    <br>
<p>The name of the user.</p>
        </p>
                <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>email</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-register"
               value="gabriel@gmail.com.br"
               data-component="body" hidden>
    <br>
<p>The email of the user.</p>
        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>password</small>  &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-register"
               value="123456"
               data-component="body" hidden>
    <br>
<p>The password of the user.</p>
        </p>
                <p>
            <b><code>cpf</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="cpf"
               data-endpoint="POSTapi-register"
               value="948.305.030-84"
               data-component="body" hidden>
    <br>
<p>The cpf of the user.</p>
        </p>
                <p>
            <b><code>password_confirmation</code></b>&nbsp;&nbsp;<small>password</small>  &nbsp;
                <input type="text"
               name="password_confirmation"
               data-endpoint="POSTapi-register"
               value="123456"
               data-component="body" hidden>
    <br>
<p>The password confirmation of the user.</p>
        </p>
        </form>

            <h2 id="auth-endpoints-POSTapi-login">Handle a login request to the application.</h2>

<p>
</p>



<span id="example-requests-POSTapi-login">
<blockquote>Example request:</blockquote>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost/api/login',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'email' =&gt; 'gabriel@gmail.com.br',
            'password' =&gt; '123456',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-login">
            <blockquote>
            <p>Example response (422, Validation error):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;The given data was invalid.&quot;,
    &quot;errors&quot;: {
        &quot;email&quot;: [
            &quot;The email field is required.&quot;
        ]
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 59
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;The given data was invalid.&quot;,
    &quot;errors&quot;: {
        &quot;email&quot;: [
            &quot;Usu&aacute;rio n&atilde;o encontrado em nossa base&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-login"></code></pre>
</span>
<span id="execution-error-POSTapi-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-login"></code></pre>
</span>
<form id="form-POSTapi-login" data-method="POST"
      data-path="api/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-login"
                    onclick="tryItOut('POSTapi-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-login"
                    onclick="cancelTryOut('POSTapi-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-login" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/login</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>email</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-login"
               value="gabriel@gmail.com.br"
               data-component="body" hidden>
    <br>
<p>The email of the user.</p>
        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>password</small>  &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-login"
               value="123456"
               data-component="body" hidden>
    <br>
<p>The password of the user.</p>
        </p>
        </form>

        <h1 id="user-endpoints">User endpoints</h1>

    

            <h2 id="user-endpoints-PUTapi-profile">Handle a registration request for the application.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-profile">
<blockquote>Example request:</blockquote>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'http://localhost/api/profile',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'Gabriel Mendes',
            'email' =&gt; 'gabriel@gmail.com.br',
            'password' =&gt; '123456',
            'password_confirmation' =&gt; '123456',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-PUTapi-profile">
            <blockquote>
            <p>Example response (200, success changing password):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Dados alterados. Necess&aacute;rio fazer login novamente&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (200, success not changing password):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;user&quot;: {
        &quot;id&quot;: 4,
        &quot;name&quot;: &quot;Jos&eacute; Osvaldo s&quot;,
        &quot;email&quot;: &quot;jose@gmail.com&quot;,
        &quot;email_verified_at&quot;: null,
        &quot;cpf&quot;: &quot;412.260.118-28&quot;,
        &quot;is_shopkeeper&quot;: 0,
        &quot;created_at&quot;: &quot;2022-03-11T13:31:19.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-03-12T11:52:51.000000Z&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Validation error):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;The given data was invalid.&quot;,
    &quot;errors&quot;: {
        &quot;email&quot;: [
            &quot;Esse email j&aacute; est&aacute; registrado em nossa base&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-profile" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-profile"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-profile"></code></pre>
</span>
<span id="execution-error-PUTapi-profile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-profile"></code></pre>
</span>
<form id="form-PUTapi-profile" data-method="PUT"
      data-path="api/profile"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-profile', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-profile"
                    onclick="tryItOut('PUTapi-profile');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-profile"
                    onclick="cancelTryOut('PUTapi-profile');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-profile" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/profile</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-profile" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-profile"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="PUTapi-profile"
               value="Gabriel Mendes"
               data-component="body" hidden>
    <br>
<p>The name of the user.</p>
        </p>
                <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>email</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="PUTapi-profile"
               value="gabriel@gmail.com.br"
               data-component="body" hidden>
    <br>
<p>The email of the user.</p>
        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>password</small>  &nbsp;
                <input type="text"
               name="password"
               data-endpoint="PUTapi-profile"
               value="123456"
               data-component="body" hidden>
    <br>
<p>The password of the user.</p>
        </p>
                <p>
            <b><code>password_confirmation</code></b>&nbsp;&nbsp;<small>password</small>  &nbsp;
                <input type="text"
               name="password_confirmation"
               data-endpoint="PUTapi-profile"
               value="123456"
               data-component="body" hidden>
    <br>
<p>The password confirmation of the user.</p>
        </p>
        </form>

            <h2 id="user-endpoints-GETapi-users">Paginate users according same parameters get</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-users">
<blockquote>Example request:</blockquote>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost/api/users',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'order'=&gt; 'email,desc',
            'limit'=&gt; '7',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-users">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Demo&quot;,
            &quot;email&quot;: &quot;demo@demo.com&quot;,
            &quot;cpf&quot;: &quot;***.392.260-**&quot;,
            &quot;wallet&quot;: null
        },
        {
            &quot;id&quot;: 6,
            &quot;name&quot;: &quot;Demo&quot;,
            &quot;email&quot;: &quot;demo@demo.com2&quot;,
            &quot;cpf&quot;: &quot;***.392.260-**&quot;,
            &quot;wallet&quot;: null
        },
        {
            &quot;id&quot;: 9,
            &quot;name&quot;: &quot;Jos&eacute; Osvaldo s&quot;,
            &quot;email&quot;: &quot;joao@gmail.comasd&quot;,
            &quot;cpf&quot;: &quot;***.392.260-**&quot;,
            &quot;wallet&quot;: null
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-users" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users"></code></pre>
</span>
<span id="execution-error-GETapi-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users"></code></pre>
</span>
<form id="form-GETapi-users" data-method="GET"
      data-path="api/users"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-users', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-users"
                    onclick="tryItOut('GETapi-users');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-users"
                    onclick="cancelTryOut('GETapi-users');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-users" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/users</code></b>
        </p>
                <p>
            <label id="auth-GETapi-users" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-users"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>order</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="order"
               data-endpoint="GETapi-users"
               value="email,desc"
               data-component="query" hidden>
    <br>
<p>Comma-separated fields to include in the response.</p>
            </p>
                    <p>
                <b><code>limit</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="limit"
               data-endpoint="GETapi-users"
               value="7"
               data-component="query" hidden>
    <br>
<p>Quantity to show per page. Defaults to '20'.</p>
            </p>
                </form>

            <h2 id="user-endpoints-GETapi-users--id-">GET user according $id</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-users--id-">
<blockquote>Example request:</blockquote>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost/api/users/2',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-users--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: {
        &quot;id&quot;: 5,
        &quot;name&quot;: &quot;Demo&quot;,
        &quot;email&quot;: &quot;demo@demo.com&quot;,
        &quot;cpf&quot;: &quot;***.392.260-**&quot;,
        &quot;wallet&quot;: null
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Validation error):</p>
        </blockquote>
                <pre>

<code class="language-json">{
   &quot;message&quot;: &quot;Usu&aacute;rio n&atilde;o encontrado em nossa base.&quot;,</code>
 </pre>
    </span>
<span id="execution-results-GETapi-users--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-users--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users--id-"></code></pre>
</span>
<span id="execution-error-GETapi-users--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users--id-"></code></pre>
</span>
<form id="form-GETapi-users--id-" data-method="GET"
      data-path="api/users/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-users--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-users--id-"
                    onclick="tryItOut('GETapi-users--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-users--id-"
                    onclick="cancelTryOut('GETapi-users--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-users--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/users/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-users--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-users--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-users--id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>The ID of the user.</p>
            </p>
                    </form>

            <h2 id="user-endpoints-DELETEapi-profile">Delete the user logged.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-profile">
<blockquote>Example request:</blockquote>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'http://localhost/api/profile',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-DELETEapi-profile">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Conta removida. At&eacute; breve =)&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (400, Unauthenticated):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-profile" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-profile"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-profile"></code></pre>
</span>
<span id="execution-error-DELETEapi-profile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-profile"></code></pre>
</span>
<form id="form-DELETEapi-profile" data-method="DELETE"
      data-path="api/profile"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-profile', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-profile"
                    onclick="tryItOut('DELETEapi-profile');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-profile"
                    onclick="cancelTryOut('DELETEapi-profile');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-profile" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/profile</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-profile" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-profile"
                                                                data-component="header"></label>
        </p>
                </form>

        <h1 id="wallet-endpoints">Wallet endpoints</h1>

    

            <h2 id="wallet-endpoints-POSTapi-deposit">Amount a quantity to logged user&#039;s wallet.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-deposit">
<blockquote>Example request:</blockquote>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost/api/deposit',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'amount' =&gt; 98.51,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-deposit">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Valor depositado com sucesso&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Validation error):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;The given data was invalid.&quot;,
    &quot;errors&quot;: {
        &quot;amount&quot;: [
            &quot;Necess&aacute;rio informar o valor(amount) a ser depositado&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-deposit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-deposit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-deposit"></code></pre>
</span>
<span id="execution-error-POSTapi-deposit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-deposit"></code></pre>
</span>
<form id="form-POSTapi-deposit" data-method="POST"
      data-path="api/deposit"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-deposit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-deposit"
                    onclick="tryItOut('POSTapi-deposit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-deposit"
                    onclick="cancelTryOut('POSTapi-deposit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-deposit" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/deposit</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-deposit" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-deposit"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>amount</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
                <input type="number"
               name="amount"
               data-endpoint="POSTapi-deposit"
               value="98.51"
               data-component="body" hidden>
    <br>
<p>Amount to deposit.</p>
        </p>
        </form>

            <h2 id="wallet-endpoints-GETapi-wallet">Show logged user&#039;s wallet.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-wallet">
<blockquote>Example request:</blockquote>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost/api/wallet',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-wallet">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">scenario
{
  &quot;data&quot;: {
      &quot;token&quot;: &quot;d0b14c11-eaf2-49a5-ad5d-70b2d3de590b&quot;,
      &quot;balance&quot;: &quot;R$23,00&quot;,
      &quot;received_history&quot;: [],
     &quot;payment_history&quot;: [
          {
              &quot;date&quot;: &quot;12/03/2022 01:36:02&quot;,
              &quot;value&quot;: &quot;R$1,00&quot;,
              &quot;user&quot;: {
                  &quot;id&quot;: 7,
                  &quot;name&quot;: &quot;Jos&eacute;&quot;,
                  &quot;email&quot;: &quot;jos2e@gmail.com&quot;,
                  &quot;cpf&quot;: &quot;***.412.261-**&quot;,
                  &quot;wallet&quot;: {
                      &quot;token&quot;: &quot;ads14c11-eaf2-49a5-ad5d-70b2d3de590b&quot;
                  }
              }
          },
          {
              &quot;date&quot;: &quot;12/03/2022 01:36:11&quot;,
              &quot;value&quot;: &quot;R$12,00&quot;,
              &quot;user&quot;: {
                  &quot;id&quot;: 7,
                  &quot;name&quot;: &quot;Jos&eacute;&quot;,
                  &quot;email&quot;: &quot;jos2e@gmail.com&quot;,
                  &quot;cpf&quot;: &quot;***.412.261-**&quot;,
                  &quot;wallet&quot;: {
                      &quot;token&quot;: &quot;ads14c11-eaf2-49a5-ad5d-70b2d3de590b&quot;
                  }
              }
          }
      ]
 }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-wallet" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-wallet"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-wallet"></code></pre>
</span>
<span id="execution-error-GETapi-wallet" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-wallet"></code></pre>
</span>
<form id="form-GETapi-wallet" data-method="GET"
      data-path="api/wallet"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-wallet', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-wallet"
                    onclick="tryItOut('GETapi-wallet');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-wallet"
                    onclick="cancelTryOut('GETapi-wallet');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-wallet" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/wallet</code></b>
        </p>
                <p>
            <label id="auth-GETapi-wallet" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-wallet"
                                                                data-component="header"></label>
        </p>
                </form>

    

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="php">php</button>
                            </div>
            </div>
</div>
</body>
</html>
