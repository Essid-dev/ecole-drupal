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

/* modules/custom/job/templates/jobs.html.twig */
class __TwigTemplate_c95668e95983940c3fb4b6275b3a7d9bbe17f0e1924d60fc8462d508c1943b2c extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["for" => 34];
        $filters = ["escape" => 21];
        $functions = ["path" => 45];

        try {
            $this->sandbox->checkSecurity(
                ['for'],
                ['escape'],
                ['path']
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
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "modules/custom/job/templates/jobs.html.twig"));

        // line 2
        echo "

<section class=\"packages\">
  <h3 class=\"title\">Rejoindre le marché mondial du travail</h3>
  <p>Nous créons le match parfait entre tes aspirations et tes compétences.
    Ignition Program t'aide à accéder aux meilleures opportunités parmi 1500 startups.</p>
  <hr>

</section>

";
        // line 19
        echo "<div class=\"searching\">
<div class=\"search_class\">
  ";
        // line 21
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["form"] ?? null), "form_build_id", [])), "html", null, true);
        echo "
  ";
        // line 22
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["form"] ?? null), "form_token", [])), "html", null, true);
        echo "
  ";
        // line 23
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["form"] ?? null), "form_id", [])), "html", null, true);
        echo "

  ";
        // line 25
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["form"] ?? null), "submit", [])), "html", null, true);
        echo "
  ";
        // line 26
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["form"] ?? null)), "html", null, true);
        echo "

</div></div>


<div class=\"card_job\">
  <div class=\"container py-5\">
    <div class=\"row justify-content-center\">
      ";
        // line 34
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["data"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["e"]) {
            // line 35
            echo "        <div class=\"col-12 col-lg-4\">
          <div class=\"card box-shadow mx-auto my-5\" style=\"width: 18rem;\">
            <img src=\"https://wallpapercave.com/wp/wp6606964.jpg\" class=\"card-img-top\" alt=\"...\">
            <div class=\"card-body\">
              <h5 class=\"card-title\">";
            // line 39
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["e"], "name", [])), "html", null, true);
            echo " </h5>
              <h6 class=\"card-title\">Salaire : ";
            // line 40
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["e"], "salaire", [])), "html", null, true);
            echo "\$</h6>
              <hr>
              <p class=\"card-text\">";
            // line 42
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["e"], "ville", [])), "html", null, true);
            echo "</p>
            </div>
            <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 1440 320\"><path fill=\"#ffffff\" fill-opacity=\"1\" d=\"M0,256L48,256C96,256,192,256,288,245.3C384,235,480,213,576,181.3C672,149,768,107,864,112C960,117,1056,171,1152,186.7C1248,203,1344,181,1392,170.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z\"></path></svg>
            <a href=\"";
            // line 45
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getPath("job.details", ["id" => $this->getAttribute($context["e"], "id", [])]), "html", null, true);
            echo "\"><i class=\"fas fa-check-circle\"></i></a>
          </div>
        </div>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['e'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "    </div>
  </div>



</div>








";
        
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

    }

    public function getTemplateName()
    {
        return "modules/custom/job/templates/jobs.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  137 => 49,  127 => 45,  121 => 42,  116 => 40,  112 => 39,  106 => 35,  102 => 34,  91 => 26,  87 => 25,  82 => 23,  78 => 22,  74 => 21,  70 => 19,  58 => 2,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{# [module]/templates/job.html.twig #}


<section class=\"packages\">
  <h3 class=\"title\">Rejoindre le marché mondial du travail</h3>
  <p>Nous créons le match parfait entre tes aspirations et tes compétences.
    Ignition Program t'aide à accéder aux meilleures opportunités parmi 1500 startups.</p>
  <hr>

</section>

{# <div class=\"searching\">

<form action=\"job/search\" method=\"post\" id=\"search-form\" class=\"search-container\">
    <input type=\"text\"  name=\"keys\"  id=\"search-bar\" class=\"searchTerm\" placeholder=\"Titre de poste ou mot-clé \"/>
    <a href=\"#\"><img class=\"search-icon\" src=\"https://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png\" alt=\"...\"></a>
</form>
</div> #}
<div class=\"searching\">
<div class=\"search_class\">
  {{ form.form_build_id }}
  {{ form.form_token }}
  {{ form.form_id }}

  {{ form.submit }}
  {{ form }}

</div></div>


<div class=\"card_job\">
  <div class=\"container py-5\">
    <div class=\"row justify-content-center\">
      {% for e in data %}
        <div class=\"col-12 col-lg-4\">
          <div class=\"card box-shadow mx-auto my-5\" style=\"width: 18rem;\">
            <img src=\"https://wallpapercave.com/wp/wp6606964.jpg\" class=\"card-img-top\" alt=\"...\">
            <div class=\"card-body\">
              <h5 class=\"card-title\">{{ e.name }} </h5>
              <h6 class=\"card-title\">Salaire : {{ e.salaire }}\$</h6>
              <hr>
              <p class=\"card-text\">{{ e.ville }}</p>
            </div>
            <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 1440 320\"><path fill=\"#ffffff\" fill-opacity=\"1\" d=\"M0,256L48,256C96,256,192,256,288,245.3C384,235,480,213,576,181.3C672,149,768,107,864,112C960,117,1056,171,1152,186.7C1248,203,1344,181,1392,170.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z\"></path></svg>
            <a href=\"{{ path('job.details', {'id': e.id}) }}\"><i class=\"fas fa-check-circle\"></i></a>
          </div>
        </div>
      {% endfor %}
    </div>
  </div>



</div>








", "modules/custom/job/templates/jobs.html.twig", "/Users/ibrahim/Sites/devdesktop/drupalweb/modules/custom/job/templates/jobs.html.twig");
    }
}
