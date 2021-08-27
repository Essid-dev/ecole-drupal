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

/* modules/custom/job/templates/job-detail.html.twig */
class __TwigTemplate_310af8f8f2eb8c39409e6a43b884f054351b954020198234e16c03feea3904aa extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["for" => 17];
        $filters = ["escape" => 18];
        $functions = ["path" => 25];

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
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "modules/custom/job/templates/job-detail.html.twig"));

        // line 2
        echo "
<section class=\"packages\">
  <h3 class=\"title\">Déposez votre CV - Laissez les employeurs vous trouver</h3>
  <p>Des milliers de CV sont consultés chaque jour par les recruteurs sur Monster. Déposez votre CV pour être directement contacté par votre futur employeur et trouvez le job qui vous convient vraiment.</p>
  <hr>

</section>

<div id=\"app\">
  <div class=\"container container-space\">
    <div class=\"row\">
      <div class=\"col-md-6\">
        <img class=\"img-fluid\" style =\"height: 370px;\" src=\"https://res.cloudinary.com/practicaldev/image/fetch/s--qa72YNaF--/c_limit%2Cf_auto%2Cfl_progressive%2Cq_auto%2Cw_880/https://dev-to-uploads.s3.amazonaws.com/i/me6sbpz893h3a6ip5zsv.jpg\" alt=\"\" />
      </div>
      <div class=\"space col-md-6\">
        ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["data"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["e"]) {
            // line 18
            echo "        <h1 class=\"my-4\">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["e"], "name", [])), "html", null, true);
            echo " - ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["e"], "salaire", [])), "html", null, true);
            echo " \$</h1>
        <h3 class=\"my-3\">
        </h3>
        <h4>Description: </h4>
        <p>";
            // line 22
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["e"], "description", [])), "html", null, true);
            echo "</p>
        <h6 class=\"my-3\">Date: ";
            // line 23
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["e"], "date", [])), "html", null, true);
            echo " , ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["e"], "ville", [])), "html", null, true);
            echo " </h6>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a href=\"";
            // line 25
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getPath("job.apply", ["id" => $this->getAttribute($context["e"], "id", [])]), "html", null, true);
            echo "\" class=\"apply\" data-title=\"Candidater !\"></a>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['e'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "      </div>
    </div>
  </div>
</div>
";
        
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

    }

    public function getTemplateName()
    {
        return "modules/custom/job/templates/job-detail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 27,  100 => 25,  93 => 23,  89 => 22,  79 => 18,  75 => 17,  58 => 2,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{# [module]/templates/job-detail.html.twig #}

<section class=\"packages\">
  <h3 class=\"title\">Déposez votre CV - Laissez les employeurs vous trouver</h3>
  <p>Des milliers de CV sont consultés chaque jour par les recruteurs sur Monster. Déposez votre CV pour être directement contacté par votre futur employeur et trouvez le job qui vous convient vraiment.</p>
  <hr>

</section>

<div id=\"app\">
  <div class=\"container container-space\">
    <div class=\"row\">
      <div class=\"col-md-6\">
        <img class=\"img-fluid\" style =\"height: 370px;\" src=\"https://res.cloudinary.com/practicaldev/image/fetch/s--qa72YNaF--/c_limit%2Cf_auto%2Cfl_progressive%2Cq_auto%2Cw_880/https://dev-to-uploads.s3.amazonaws.com/i/me6sbpz893h3a6ip5zsv.jpg\" alt=\"\" />
      </div>
      <div class=\"space col-md-6\">
        {% for e in data %}
        <h1 class=\"my-4\">{{e.name}} - {{e.salaire}} \$</h1>
        <h3 class=\"my-3\">
        </h3>
        <h4>Description: </h4>
        <p>{{e.description}}</p>
        <h6 class=\"my-3\">Date: {{ e.date }} , {{ e.ville }} </h6>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a href=\"{{ path('job.apply', {'id': e.id}) }}\" class=\"apply\" data-title=\"Candidater !\"></a>
        {% endfor %}
      </div>
    </div>
  </div>
</div>
", "modules/custom/job/templates/job-detail.html.twig", "/Users/ibrahim/Sites/devdesktop/drupalweb/modules/custom/job/templates/job-detail.html.twig");
    }
}
