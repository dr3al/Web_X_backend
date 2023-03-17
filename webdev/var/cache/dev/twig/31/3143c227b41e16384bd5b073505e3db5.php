<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* @ApiPlatform/SwaggerUi/index.html.twig */
class __TwigTemplate_34d162b490298e37f8a856f678d1f8f6 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'head_metas' => [$this, 'block_head_metas'],
            'title' => [$this, 'block_title'],
            'stylesheet' => [$this, 'block_stylesheet'],
            'head_javascript' => [$this, 'block_head_javascript'],
            'header' => [$this, 'block_header'],
            'javascript' => [$this, 'block_javascript'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@ApiPlatform/SwaggerUi/index.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    ";
        // line 4
        $this->displayBlock('head_metas', $context, $blocks);
        // line 7
        echo "
    ";
        // line 8
        $this->displayBlock('title', $context, $blocks);
        // line 11
        echo "
    ";
        // line 12
        $this->displayBlock('stylesheet', $context, $blocks);
        // line 18
        echo "
    ";
        // line 19
        $context["oauth_data"] = ["oauth" => twig_array_merge(twig_get_attribute($this->env, $this->source, (isset($context["swagger_data"]) || array_key_exists("swagger_data", $context) ? $context["swagger_data"] : (function () { throw new RuntimeError('Variable "swagger_data" does not exist.', 19, $this->source); })()), "oauth", [], "any", false, false, false, 19), ["redirectUrl" => $this->extensions['Symfony\Bridge\Twig\Extension\HttpFoundationExtension']->generateAbsoluteUrl($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/swagger-ui/oauth2-redirect.html", (isset($context["assetPackage"]) || array_key_exists("assetPackage", $context) ? $context["assetPackage"] : (function () { throw new RuntimeError('Variable "assetPackage" does not exist.', 19, $this->source); })())))])];
        // line 20
        echo "
    ";
        // line 21
        $this->displayBlock('head_javascript', $context, $blocks);
        // line 25
        echo "</head>

<body>
<svg xmlns=\"http://www.w3.org/2000/svg\" class=\"svg-icons\">
    <defs>
        <symbol viewBox=\"0 0 20 20\" id=\"unlocked\">
            <path d=\"M15.8 8H14V5.6C14 2.703 12.665 1 10 1 7.334 1 6 2.703 6 5.6V6h2v-.801C8 3.754 8.797 3 10 3c1.203 0 2 .754 2 2.199V8H4c-.553 0-1 .646-1 1.199V17c0 .549.428 1.139.951 1.307l1.197.387C5.672 18.861 6.55 19 7.1 19h5.8c.549 0 1.428-.139 1.951-.307l1.196-.387c.524-.167.953-.757.953-1.306V9.199C17 8.646 16.352 8 15.8 8z\"></path>
        </symbol>

        <symbol viewBox=\"0 0 20 20\" id=\"locked\">
            <path d=\"M15.8 8H14V5.6C14 2.703 12.665 1 10 1 7.334 1 6 2.703 6 5.6V8H4c-.553 0-1 .646-1 1.199V17c0 .549.428 1.139.951 1.307l1.197.387C5.672 18.861 6.55 19 7.1 19h5.8c.549 0 1.428-.139 1.951-.307l1.196-.387c.524-.167.953-.757.953-1.306V9.199C17 8.646 16.352 8 15.8 8zM12 8H8V5.199C8 3.754 8.797 3 10 3c1.203 0 2 .754 2 2.199V8z\"></path>
        </symbol>

        <symbol viewBox=\"0 0 20 20\" id=\"close\">
            <path d=\"M14.348 14.849c-.469.469-1.229.469-1.697 0L10 11.819l-2.651 3.029c-.469.469-1.229.469-1.697 0-.469-.469-.469-1.229 0-1.697l2.758-3.15-2.759-3.152c-.469-.469-.469-1.228 0-1.697.469-.469 1.228-.469 1.697 0L10 8.183l2.651-3.031c.469-.469 1.228-.469 1.697 0 .469.469.469 1.229 0 1.697l-2.758 3.152 2.758 3.15c.469.469.469 1.229 0 1.698z\"></path>
        </symbol>

        <symbol viewBox=\"0 0 20 20\" id=\"large-arrow\">
            <path d=\"M13.25 10L6.109 2.58c-.268-.27-.268-.707 0-.979.268-.27.701-.27.969 0l7.83 7.908c.268.271.268.709 0 .979l-7.83 7.908c-.268.271-.701.27-.969 0-.268-.269-.268-.707 0-.979L13.25 10z\"></path>
        </symbol>

        <symbol viewBox=\"0 0 20 20\" id=\"large-arrow-down\">
            <path d=\"M17.418 6.109c.272-.268.709-.268.979 0s.271.701 0 .969l-7.908 7.83c-.27.268-.707.268-.979 0l-7.908-7.83c-.27-.268-.27-.701 0-.969.271-.268.709-.268.979 0L10 13.25l7.418-7.141z\"></path>
        </symbol>


        <symbol viewBox=\"0 0 24 24\" id=\"jump-to\">
            <path d=\"M19 7v4H5.83l3.58-3.59L8 6l-6 6 6 6 1.41-1.41L5.83 13H21V7z\"></path>
        </symbol>

        <symbol viewBox=\"0 0 24 24\" id=\"expand\">
            <path d=\"M10 18h4v-2h-4v2zM3 6v2h18V6H3zm3 7h12v-2H6v2z\"></path>
        </symbol>

    </defs>
</svg>

";
        // line 62
        $this->displayBlock('header', $context, $blocks);
        // line 67
        echo "
";
        // line 68
        if ((isset($context["showWebby"]) || array_key_exists("showWebby", $context) ? $context["showWebby"] : (function () { throw new RuntimeError('Variable "showWebby" does not exist.', 68, $this->source); })())) {
            // line 69
            echo "    <div class=\"web\"><img src=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/web.png", (isset($context["assetPackage"]) || array_key_exists("assetPackage", $context) ? $context["assetPackage"] : (function () { throw new RuntimeError('Variable "assetPackage" does not exist.', 69, $this->source); })())), "html", null, true);
            echo "\"></div>
    <div class=\"webby\"><img src=\"";
            // line 70
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/webby.png", (isset($context["assetPackage"]) || array_key_exists("assetPackage", $context) ? $context["assetPackage"] : (function () { throw new RuntimeError('Variable "assetPackage" does not exist.', 70, $this->source); })())), "html", null, true);
            echo "\"></div>
";
        }
        // line 72
        echo "
<div id=\"swagger-ui\" class=\"api-platform\"></div>

<div class=\"swagger-ui\" id=\"formats\">
    <div class=\"information-container wrapper\">
        <div class=\"info\">
            Available formats:
            ";
        // line 79
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_array_keys_filter((isset($context["formats"]) || array_key_exists("formats", $context) ? $context["formats"] : (function () { throw new RuntimeError('Variable "formats" does not exist.', 79, $this->source); })())));
        foreach ($context['_seq'] as $context["_key"] => $context["format"]) {
            // line 80
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 80, $this->source); })()), "request", [], "any", false, false, false, 80), "attributes", [], "any", false, false, false, 80), "get", [0 => "_route"], "method", false, false, false, 80), twig_array_merge(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 80, $this->source); })()), "request", [], "any", false, false, false, 80), "attributes", [], "any", false, false, false, 80), "get", [0 => "_route_params"], "method", false, false, false, 80), ["_format" => $context["format"]])), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["format"], "html", null, true);
            echo "</a>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['format'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 82
        echo "            <br>
            Other API docs:
            ";
        // line 84
        $context["active_ui"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 84, $this->source); })()), "request", [], "any", false, false, false, 84), "get", [0 => "ui", 1 => "swagger_ui"], "method", false, false, false, 84);
        // line 85
        echo "            ";
        if (((isset($context["swaggerUiEnabled"]) || array_key_exists("swaggerUiEnabled", $context) ? $context["swaggerUiEnabled"] : (function () { throw new RuntimeError('Variable "swaggerUiEnabled" does not exist.', 85, $this->source); })()) && ((isset($context["active_ui"]) || array_key_exists("active_ui", $context) ? $context["active_ui"] : (function () { throw new RuntimeError('Variable "active_ui" does not exist.', 85, $this->source); })()) != "swagger_ui"))) {
            echo "<a href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("api_doc");
            echo "\">Swagger UI</a>";
        }
        // line 86
        echo "            ";
        if (((isset($context["reDocEnabled"]) || array_key_exists("reDocEnabled", $context) ? $context["reDocEnabled"] : (function () { throw new RuntimeError('Variable "reDocEnabled" does not exist.', 86, $this->source); })()) && ((isset($context["active_ui"]) || array_key_exists("active_ui", $context) ? $context["active_ui"] : (function () { throw new RuntimeError('Variable "active_ui" does not exist.', 86, $this->source); })()) != "re_doc"))) {
            echo "<a href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("api_doc", ["ui" => "re_doc"]);
            echo "\">ReDoc</a>";
        }
        // line 87
        echo "            ";
        if (( !(isset($context["graphQlEnabled"]) || array_key_exists("graphQlEnabled", $context) ? $context["graphQlEnabled"] : (function () { throw new RuntimeError('Variable "graphQlEnabled" does not exist.', 87, $this->source); })()) || (isset($context["graphiQlEnabled"]) || array_key_exists("graphiQlEnabled", $context) ? $context["graphiQlEnabled"] : (function () { throw new RuntimeError('Variable "graphiQlEnabled" does not exist.', 87, $this->source); })()))) {
            echo "<a ";
            if ((isset($context["graphiQlEnabled"]) || array_key_exists("graphiQlEnabled", $context) ? $context["graphiQlEnabled"] : (function () { throw new RuntimeError('Variable "graphiQlEnabled" does not exist.', 87, $this->source); })())) {
                echo "href=\"";
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("api_graphql_graphiql");
                echo "\"";
            }
            echo " class=\"graphiql-link\">GraphiQL</a>";
        }
        // line 88
        echo "            ";
        if ((isset($context["graphQlPlaygroundEnabled"]) || array_key_exists("graphQlPlaygroundEnabled", $context) ? $context["graphQlPlaygroundEnabled"] : (function () { throw new RuntimeError('Variable "graphQlPlaygroundEnabled" does not exist.', 88, $this->source); })())) {
            echo "<a href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("api_graphql_graphql_playground");
            echo "\">GraphQL Playground (deprecated)</a>";
        }
        // line 89
        echo "        </div>
    </div>
</div>

";
        // line 93
        $this->displayBlock('javascript', $context, $blocks);
        // line 104
        echo "
</body>
</html>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 4
    public function block_head_metas($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "head_metas"));

        // line 5
        echo "        <meta charset=\"UTF-8\">
    ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 8
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        // line 9
        echo "        <title>";
        if ((isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 9, $this->source); })())) {
            echo twig_escape_filter($this->env, (isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 9, $this->source); })()), "html", null, true);
            echo " - ";
        }
        echo "API Platform</title>
    ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 12
    public function block_stylesheet($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheet"));

        // line 13
        echo "        <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/fonts/open-sans/400.css", (isset($context["assetPackage"]) || array_key_exists("assetPackage", $context) ? $context["assetPackage"] : (function () { throw new RuntimeError('Variable "assetPackage" does not exist.', 13, $this->source); })())), "html", null, true);
        echo "\">
        <link rel=\"stylesheet\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/fonts/open-sans/700.css", (isset($context["assetPackage"]) || array_key_exists("assetPackage", $context) ? $context["assetPackage"] : (function () { throw new RuntimeError('Variable "assetPackage" does not exist.', 14, $this->source); })())), "html", null, true);
        echo "\">
        <link rel=\"stylesheet\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/swagger-ui/swagger-ui.css", (isset($context["assetPackage"]) || array_key_exists("assetPackage", $context) ? $context["assetPackage"] : (function () { throw new RuntimeError('Variable "assetPackage" does not exist.', 15, $this->source); })())), "html", null, true);
        echo "\">
        <link rel=\"stylesheet\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/style.css", (isset($context["assetPackage"]) || array_key_exists("assetPackage", $context) ? $context["assetPackage"] : (function () { throw new RuntimeError('Variable "assetPackage" does not exist.', 16, $this->source); })())), "html", null, true);
        echo "\">
    ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 21
    public function block_head_javascript($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "head_javascript"));

        // line 22
        echo "        ";
        // line 23
        echo "        <script id=\"swagger-data\" type=\"application/json\">";
        echo json_encode(twig_array_merge((isset($context["swagger_data"]) || array_key_exists("swagger_data", $context) ? $context["swagger_data"] : (function () { throw new RuntimeError('Variable "swagger_data" does not exist.', 23, $this->source); })()), (isset($context["oauth_data"]) || array_key_exists("oauth_data", $context) ? $context["oauth_data"] : (function () { throw new RuntimeError('Variable "oauth_data" does not exist.', 23, $this->source); })())), 65);
        echo "</script>
    ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 62
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "header"));

        // line 63
        echo "    <header>
        <a id=\"logo\" href=\"https://api-platform.com\"><img src=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/logo-header.svg", (isset($context["assetPackage"]) || array_key_exists("assetPackage", $context) ? $context["assetPackage"] : (function () { throw new RuntimeError('Variable "assetPackage" does not exist.', 64, $this->source); })())), "html", null, true);
        echo "\" alt=\"API Platform\"></a>
    </header>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 93
    public function block_javascript($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascript"));

        // line 94
        echo "    ";
        if ((((isset($context["reDocEnabled"]) || array_key_exists("reDocEnabled", $context) ? $context["reDocEnabled"] : (function () { throw new RuntimeError('Variable "reDocEnabled" does not exist.', 94, $this->source); })()) &&  !(isset($context["swaggerUiEnabled"]) || array_key_exists("swaggerUiEnabled", $context) ? $context["swaggerUiEnabled"] : (function () { throw new RuntimeError('Variable "swaggerUiEnabled" does not exist.', 94, $this->source); })())) || ((isset($context["reDocEnabled"]) || array_key_exists("reDocEnabled", $context) ? $context["reDocEnabled"] : (function () { throw new RuntimeError('Variable "reDocEnabled" does not exist.', 94, $this->source); })()) && ("re_doc" == (isset($context["active_ui"]) || array_key_exists("active_ui", $context) ? $context["active_ui"] : (function () { throw new RuntimeError('Variable "active_ui" does not exist.', 94, $this->source); })()))))) {
            // line 95
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/redoc/redoc.standalone.js", (isset($context["assetPackage"]) || array_key_exists("assetPackage", $context) ? $context["assetPackage"] : (function () { throw new RuntimeError('Variable "assetPackage" does not exist.', 95, $this->source); })())), "html", null, true);
            echo "\"></script>
        <script src=\"";
            // line 96
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/init-redoc-ui.js", (isset($context["assetPackage"]) || array_key_exists("assetPackage", $context) ? $context["assetPackage"] : (function () { throw new RuntimeError('Variable "assetPackage" does not exist.', 96, $this->source); })())), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // line 98
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/swagger-ui/swagger-ui-bundle.js", (isset($context["assetPackage"]) || array_key_exists("assetPackage", $context) ? $context["assetPackage"] : (function () { throw new RuntimeError('Variable "assetPackage" does not exist.', 98, $this->source); })())), "html", null, true);
            echo "\"></script>
        <script src=\"";
            // line 99
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/swagger-ui/swagger-ui-standalone-preset.js", (isset($context["assetPackage"]) || array_key_exists("assetPackage", $context) ? $context["assetPackage"] : (function () { throw new RuntimeError('Variable "assetPackage" does not exist.', 99, $this->source); })())), "html", null, true);
            echo "\"></script>
        <script src=\"";
            // line 100
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/init-swagger-ui.js", (isset($context["assetPackage"]) || array_key_exists("assetPackage", $context) ? $context["assetPackage"] : (function () { throw new RuntimeError('Variable "assetPackage" does not exist.', 100, $this->source); })())), "html", null, true);
            echo "\"></script>
    ";
        }
        // line 102
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/init-common-ui.js", (isset($context["assetPackage"]) || array_key_exists("assetPackage", $context) ? $context["assetPackage"] : (function () { throw new RuntimeError('Variable "assetPackage" does not exist.', 102, $this->source); })())), "html", null, true);
        echo "\" defer></script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "@ApiPlatform/SwaggerUi/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  346 => 102,  341 => 100,  337 => 99,  332 => 98,  327 => 96,  322 => 95,  319 => 94,  312 => 93,  302 => 64,  299 => 63,  292 => 62,  282 => 23,  280 => 22,  273 => 21,  264 => 16,  260 => 15,  256 => 14,  251 => 13,  244 => 12,  231 => 9,  224 => 8,  216 => 5,  209 => 4,  199 => 104,  197 => 93,  191 => 89,  184 => 88,  173 => 87,  166 => 86,  159 => 85,  157 => 84,  153 => 82,  142 => 80,  138 => 79,  129 => 72,  124 => 70,  119 => 69,  117 => 68,  114 => 67,  112 => 62,  73 => 25,  71 => 21,  68 => 20,  66 => 19,  63 => 18,  61 => 12,  58 => 11,  56 => 8,  53 => 7,  51 => 4,  46 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
<head>
    {% block head_metas %}
        <meta charset=\"UTF-8\">
    {% endblock %}

    {% block title %}
        <title>{% if title %}{{ title }} - {% endif %}API Platform</title>
    {% endblock %}

    {% block stylesheet %}
        <link rel=\"stylesheet\" href=\"{{ asset('bundles/apiplatform/fonts/open-sans/400.css', assetPackage) }}\">
        <link rel=\"stylesheet\" href=\"{{ asset('bundles/apiplatform/fonts/open-sans/700.css', assetPackage) }}\">
        <link rel=\"stylesheet\" href=\"{{ asset('bundles/apiplatform/swagger-ui/swagger-ui.css', assetPackage) }}\">
        <link rel=\"stylesheet\" href=\"{{ asset('bundles/apiplatform/style.css', assetPackage) }}\">
    {% endblock %}

    {% set oauth_data = {'oauth': swagger_data.oauth|merge({'redirectUrl' : absolute_url(asset('bundles/apiplatform/swagger-ui/oauth2-redirect.html', assetPackage)) })} %}

    {% block head_javascript %}
        {# json_encode(65) is for JSON_UNESCAPED_SLASHES|JSON_HEX_TAG to avoid JS XSS #}
        <script id=\"swagger-data\" type=\"application/json\">{{ swagger_data|merge(oauth_data)|json_encode(65)|raw }}</script>
    {% endblock %}
</head>

<body>
<svg xmlns=\"http://www.w3.org/2000/svg\" class=\"svg-icons\">
    <defs>
        <symbol viewBox=\"0 0 20 20\" id=\"unlocked\">
            <path d=\"M15.8 8H14V5.6C14 2.703 12.665 1 10 1 7.334 1 6 2.703 6 5.6V6h2v-.801C8 3.754 8.797 3 10 3c1.203 0 2 .754 2 2.199V8H4c-.553 0-1 .646-1 1.199V17c0 .549.428 1.139.951 1.307l1.197.387C5.672 18.861 6.55 19 7.1 19h5.8c.549 0 1.428-.139 1.951-.307l1.196-.387c.524-.167.953-.757.953-1.306V9.199C17 8.646 16.352 8 15.8 8z\"></path>
        </symbol>

        <symbol viewBox=\"0 0 20 20\" id=\"locked\">
            <path d=\"M15.8 8H14V5.6C14 2.703 12.665 1 10 1 7.334 1 6 2.703 6 5.6V8H4c-.553 0-1 .646-1 1.199V17c0 .549.428 1.139.951 1.307l1.197.387C5.672 18.861 6.55 19 7.1 19h5.8c.549 0 1.428-.139 1.951-.307l1.196-.387c.524-.167.953-.757.953-1.306V9.199C17 8.646 16.352 8 15.8 8zM12 8H8V5.199C8 3.754 8.797 3 10 3c1.203 0 2 .754 2 2.199V8z\"></path>
        </symbol>

        <symbol viewBox=\"0 0 20 20\" id=\"close\">
            <path d=\"M14.348 14.849c-.469.469-1.229.469-1.697 0L10 11.819l-2.651 3.029c-.469.469-1.229.469-1.697 0-.469-.469-.469-1.229 0-1.697l2.758-3.15-2.759-3.152c-.469-.469-.469-1.228 0-1.697.469-.469 1.228-.469 1.697 0L10 8.183l2.651-3.031c.469-.469 1.228-.469 1.697 0 .469.469.469 1.229 0 1.697l-2.758 3.152 2.758 3.15c.469.469.469 1.229 0 1.698z\"></path>
        </symbol>

        <symbol viewBox=\"0 0 20 20\" id=\"large-arrow\">
            <path d=\"M13.25 10L6.109 2.58c-.268-.27-.268-.707 0-.979.268-.27.701-.27.969 0l7.83 7.908c.268.271.268.709 0 .979l-7.83 7.908c-.268.271-.701.27-.969 0-.268-.269-.268-.707 0-.979L13.25 10z\"></path>
        </symbol>

        <symbol viewBox=\"0 0 20 20\" id=\"large-arrow-down\">
            <path d=\"M17.418 6.109c.272-.268.709-.268.979 0s.271.701 0 .969l-7.908 7.83c-.27.268-.707.268-.979 0l-7.908-7.83c-.27-.268-.27-.701 0-.969.271-.268.709-.268.979 0L10 13.25l7.418-7.141z\"></path>
        </symbol>


        <symbol viewBox=\"0 0 24 24\" id=\"jump-to\">
            <path d=\"M19 7v4H5.83l3.58-3.59L8 6l-6 6 6 6 1.41-1.41L5.83 13H21V7z\"></path>
        </symbol>

        <symbol viewBox=\"0 0 24 24\" id=\"expand\">
            <path d=\"M10 18h4v-2h-4v2zM3 6v2h18V6H3zm3 7h12v-2H6v2z\"></path>
        </symbol>

    </defs>
</svg>

{% block header %}
    <header>
        <a id=\"logo\" href=\"https://api-platform.com\"><img src=\"{{ asset('bundles/apiplatform/logo-header.svg', assetPackage) }}\" alt=\"API Platform\"></a>
    </header>
{% endblock %}

{% if showWebby %}
    <div class=\"web\"><img src=\"{{ asset('bundles/apiplatform/web.png', assetPackage) }}\"></div>
    <div class=\"webby\"><img src=\"{{ asset('bundles/apiplatform/webby.png', assetPackage) }}\"></div>
{% endif %}

<div id=\"swagger-ui\" class=\"api-platform\"></div>

<div class=\"swagger-ui\" id=\"formats\">
    <div class=\"information-container wrapper\">
        <div class=\"info\">
            Available formats:
            {% for format in formats|keys %}
                <a href=\"{{ path(app.request.attributes.get('_route'), app.request.attributes.get('_route_params')|merge({'_format': format})) }}\">{{ format }}</a>
            {% endfor %}
            <br>
            Other API docs:
            {% set active_ui = app.request.get('ui', 'swagger_ui') %}
            {% if swaggerUiEnabled and active_ui != 'swagger_ui' %}<a href=\"{{ path('api_doc') }}\">Swagger UI</a>{% endif %}
            {% if reDocEnabled and active_ui != 're_doc' %}<a href=\"{{ path('api_doc', {'ui': 're_doc'}) }}\">ReDoc</a>{% endif %}
            {% if not graphQlEnabled or graphiQlEnabled %}<a {% if graphiQlEnabled %}href=\"{{ path('api_graphql_graphiql') }}\"{% endif %} class=\"graphiql-link\">GraphiQL</a>{% endif %}
            {% if graphQlPlaygroundEnabled %}<a href=\"{{ path('api_graphql_graphql_playground') }}\">GraphQL Playground (deprecated)</a>{% endif %}
        </div>
    </div>
</div>

{% block javascript %}
    {% if (reDocEnabled and not swaggerUiEnabled) or (reDocEnabled and 're_doc' == active_ui) %}
        <script src=\"{{ asset('bundles/apiplatform/redoc/redoc.standalone.js', assetPackage) }}\"></script>
        <script src=\"{{ asset('bundles/apiplatform/init-redoc-ui.js', assetPackage) }}\"></script>
    {% else %}
        <script src=\"{{ asset('bundles/apiplatform/swagger-ui/swagger-ui-bundle.js', assetPackage) }}\"></script>
        <script src=\"{{ asset('bundles/apiplatform/swagger-ui/swagger-ui-standalone-preset.js', assetPackage) }}\"></script>
        <script src=\"{{ asset('bundles/apiplatform/init-swagger-ui.js', assetPackage) }}\"></script>
    {% endif %}
    <script src=\"{{ asset('bundles/apiplatform/init-common-ui.js', assetPackage) }}\" defer></script>
{% endblock %}

</body>
</html>
", "@ApiPlatform/SwaggerUi/index.html.twig", "C:\\Users\\dimon\\PhpstormProjects\\Web_X_backend\\webdev\\vendor\\api-platform\\core\\src\\Symfony\\Bundle\\Resources\\views\\SwaggerUi\\index.html.twig");
    }
}
