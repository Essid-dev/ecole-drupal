<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/Ecole/templates/page.html.twig */
class __TwigTemplate_6516edf16d46302cb1333608f4e9443d32d1930ac953b0a655ef550d31e05a2c extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = [];
        $filters = ["escape" => 14];
        $functions = ["kint" => 1, "path" => 18];

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape'],
                ['kint', 'path']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453 = $this->env->getExtension("Drupal\\webprofiler\\Twig\\Extension\\ProfilerExtension");
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "themes/Ecole/templates/page.html.twig"));

        // line 1
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\kint\Twig\KintExtension')->kint($this->env, $context, [0 => $this->sandbox->ensureToStringAllowed(($context["page"] ?? null))]));
        echo "
<html>
<head>
  <link rel=\"stylesheet\" href=\"css/main.css\">
  <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css\" integrity=\"sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T\" crossorigin=\"anonymous\">
  <link src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css\"></link>
  <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js\"></script>
  <script src=\"jquery-3.5.1.min.js\"></script>
  <link rel=\"stylesheet\" href=\"https://pro.fontawesome.com/releases/v5.10.0/css/all.css\" integrity=\"sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p\" crossorigin=\"anonymous\"/>

</head>
<body>
<header>
  ";
        // line 14
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "header", [])), "html", null, true);
        echo "
  <h2><a href=\"/home\" style=\"color: black;font-weight: 600;\">TopWork</a></h2>
  <nav style=\"justify-content: flex-end;\">
    <li><a style=\"display: flex; margin-right: -15px;color:black; font-weight: bold\" href=\"/home\">Accueil</a></li>
    <li><a style=\"display: flex; margin-right: -15px;color:black; font-weight: bold\" href=\"";
        // line 18
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\Core\Template\TwigExtension')->getPath("job.getJobList"));
        echo "\">Offres</a></li>
    <li><a style=\"display: flex; margin-right: -15px;color:black; font-weight: bold\" href=\"#\">Nous contacter</a></li>
    <li><a style=\"display: flex; margin-right: -15px;color:black; font-weight: bold\" href=\"#login\">Connexion</a></li>
  </nav>
</header>

<section class=\"hero\">
  <div class=\"background-image\"></div>
  <div class=\"hero-content-area\">
    <h1>La vie est une fête!</h1>
    <h3>Nous créons le match parfait entre tes aspirations et tes compétences. </h3>
    <a href=\"#\" class=\"btn\">Nous Contacter</a>
  </div>
</section>

<section class=\"destinations\">
  ";
        // line 34
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "content", [])), "html", null, true);
        echo "
</section>

<footer id=\"login\">
  ";
        // line 38
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "footer", [])), "html", null, true);
        echo "
  <p></p>
  <p></p>
</footer>
</body>
</html>
";
        
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

    }

    public function getTemplateName()
    {
        return "themes/Ecole/templates/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 38,  100 => 34,  81 => 18,  74 => 14,  58 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{{ kint(page) }}
<html>
<head>
  <link rel=\"stylesheet\" href=\"css/main.css\">
  <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css\" integrity=\"sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T\" crossorigin=\"anonymous\">
  <link src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css\"></link>
  <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js\"></script>
  <script src=\"jquery-3.5.1.min.js\"></script>
  <link rel=\"stylesheet\" href=\"https://pro.fontawesome.com/releases/v5.10.0/css/all.css\" integrity=\"sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p\" crossorigin=\"anonymous\"/>

</head>
<body>
<header>
  {{ page.header }}
  <h2><a href=\"/home\" style=\"color: black;font-weight: 600;\">TopWork</a></h2>
  <nav style=\"justify-content: flex-end;\">
    <li><a style=\"display: flex; margin-right: -15px;color:black; font-weight: bold\" href=\"/home\">Accueil</a></li>
    <li><a style=\"display: flex; margin-right: -15px;color:black; font-weight: bold\" href=\"{{ path('job.getJobList')}}\">Offres</a></li>
    <li><a style=\"display: flex; margin-right: -15px;color:black; font-weight: bold\" href=\"#\">Nous contacter</a></li>
    <li><a style=\"display: flex; margin-right: -15px;color:black; font-weight: bold\" href=\"#login\">Connexion</a></li>
  </nav>
</header>

<section class=\"hero\">
  <div class=\"background-image\"></div>
  <div class=\"hero-content-area\">
    <h1>La vie est une fête!</h1>
    <h3>Nous créons le match parfait entre tes aspirations et tes compétences. </h3>
    <a href=\"#\" class=\"btn\">Nous Contacter</a>
  </div>
</section>

<section class=\"destinations\">
  {{ page.content }}
</section>

<footer id=\"login\">
  {{ page.footer }}
  <p></p>
  <p></p>
</footer>
</body>
</html>
", "themes/Ecole/templates/page.html.twig", "/Users/ibrahim/Sites/devdesktop/drupalweb/themes/Ecole/templates/page.html.twig");
    }
}
