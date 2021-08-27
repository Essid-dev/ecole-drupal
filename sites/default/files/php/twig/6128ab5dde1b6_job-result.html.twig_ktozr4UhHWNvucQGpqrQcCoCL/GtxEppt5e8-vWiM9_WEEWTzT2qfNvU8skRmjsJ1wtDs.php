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

/* modules/custom/job/templates/job-result.html.twig */
class __TwigTemplate_a3944e4dfc7208383643fb667a914f1f245bc6f514e8542263d529702346f9fd extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 3, "for" => 7];
        $filters = ["escape" => 12];
        $functions = ["path" => 18];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for'],
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
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "modules/custom/job/templates/job-result.html.twig"));

        // line 2
        echo "
";
        // line 3
        if ( !twig_test_empty(($context["data"] ?? null))) {
            // line 4
            echo "  <div class=\"card_job\">
    <div class=\"container py-5\">
      <div class=\"row justify-content-center\">
        ";
            // line 7
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["data"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["e"]) {
                // line 8
                echo "          <div class=\"col-12 col-lg-4\">
            <div class=\"card box-shadow mx-auto my-5\" style=\"width: 18rem;\">
              <img src=\"https://wallpapercave.com/wp/wp6606964.jpg\" class=\"card-img-top\" alt=\"...\">
              <div class=\"card-body\">
                <h5 class=\"card-title\">";
                // line 12
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["e"], "name", [])), "html", null, true);
                echo " </h5>
                <h6 class=\"card-title\">Salaire : ";
                // line 13
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["e"], "salaire", [])), "html", null, true);
                echo "\$</h6>
                <hr>
                <p class=\"card-text\">";
                // line 15
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["e"], "ville", [])), "html", null, true);
                echo "</p>
              </div>
              <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 1440 320\"><path fill=\"#ffffff\" fill-opacity=\"1\" d=\"M0,256L48,256C96,256,192,256,288,245.3C384,235,480,213,576,181.3C672,149,768,107,864,112C960,117,1056,171,1152,186.7C1248,203,1344,181,1392,170.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z\"></path></svg>
              <a href=\"";
                // line 18
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getPath("job.details", ["id" => $this->getAttribute($context["e"], "id", [])]), "html", null, true);
                echo "\"><i class=\"fas fa-check-circle\"></i></a>
            </div>
          </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['e'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 22
            echo "      </div>
    </div>
  </div>

";
        } else {
            // line 27
            echo "  <p>Pas de résultat retourne vers la page précédente :(  <a href=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\Core\Template\TwigExtension')->getPath("job.getJobList"));
            echo "\">Return</a>
  </p>
";
        }
        // line 30
        echo "








";
        
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

    }

    public function getTemplateName()
    {
        return "modules/custom/job/templates/job-result.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 30,  110 => 27,  103 => 22,  93 => 18,  87 => 15,  82 => 13,  78 => 12,  72 => 8,  68 => 7,  63 => 4,  61 => 3,  58 => 2,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{# [module]/templates/job-result.html.twig #}

{% if data is not empty %}
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

{% else %}
  <p>Pas de résultat retourne vers la page précédente :(  <a href=\"{{ path('job.getJobList')}}\">Return</a>
  </p>
{% endif %}









", "modules/custom/job/templates/job-result.html.twig", "/Users/ibrahim/Sites/devdesktop/drupalweb/modules/custom/job/templates/job-result.html.twig");
    }
}
