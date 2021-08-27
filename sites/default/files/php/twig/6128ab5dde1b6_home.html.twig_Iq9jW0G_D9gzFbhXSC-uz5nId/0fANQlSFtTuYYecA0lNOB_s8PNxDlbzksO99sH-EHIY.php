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

/* modules/custom/job/templates/home.html.twig */
class __TwigTemplate_ac51ac70232e05d72ff4f471c3ed03f93b4bb4e2f7bdab466bf88914da368284 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = [];
        $filters = [];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                [],
                [],
                []
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
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "modules/custom/job/templates/home.html.twig"));

        // line 1
        echo "
<section class=\"packages\">
  <h3 class=\"title\">Bienvenue sur notre site</h3>
  <p>Nous créons le match parfait entre tes aspirations et tes compétences.
    Ignition Program t'aide à accéder aux meilleures opportunités parmi 1500 startups.</p>
  <hr>

</section>

<div class=\"row\">
  <div class=\"home_container\">
    <div class=\"slide\"
         style=\"background-image: url('https://www.teahub.io/photos/full/88-885387_android-developer-wallpaper-hd.jpg');\">
      <h3>Developer</h3>
    </div>
    <div class=\"slide\" style=\"
            background-image: url('https://s32519.pcdn.co/wp-content/uploads/2019/08/first-6-months-as-a-developer-at-relex-social-image.jpeg.optimal.jpeg');
          \">
      <h3>Coding</h3>
    </div>
    <div class=\"slide\" style=\"
            background-image: url('https://c0.wallpaperflare.com/preview/428/871/775/school-coding-data-software-development-thumbnail.jpg');
          \">
      <h3>Workshop</h3>
    </div>
    <div class=\"slide\" style=\"
            background-image: url('https://svitla.com/uploads_converted/0/1709-developers2.webp?1552986943');
          \">
      <h3>Meeting</h3>
    </div>
    <div class=\"slide\" style=\"
            background-image: url('https://wallpapercrafter.com/desktop/276255-work-notebook-coffee-and-laptop-hd.jpg');
          \">
      <h3>Work Hard</h3>
    </div>
  </div>
</div>

<script>
  function slidesPlugin(activeSlide = 0) {
    const slides = document.querySelectorAll(\".slide\");

    slides[activeSlide].classList.add(\"active\");

    for (const slide of slides) {
      slide.addEventListener(\"click\", () => {
        clearActiveClasses();
        slide.classList.add(\"active\");
      });
    }

    function clearActiveClasses() {
      slides.forEach((slide) => {
        slide.classList.remove(\"active\");
      });
    }
  }

  slidesPlugin(2);

</script>
";
        
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

    }

    public function getTemplateName()
    {
        return "modules/custom/job/templates/home.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  58 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("
<section class=\"packages\">
  <h3 class=\"title\">Bienvenue sur notre site</h3>
  <p>Nous créons le match parfait entre tes aspirations et tes compétences.
    Ignition Program t'aide à accéder aux meilleures opportunités parmi 1500 startups.</p>
  <hr>

</section>

<div class=\"row\">
  <div class=\"home_container\">
    <div class=\"slide\"
         style=\"background-image: url('https://www.teahub.io/photos/full/88-885387_android-developer-wallpaper-hd.jpg');\">
      <h3>Developer</h3>
    </div>
    <div class=\"slide\" style=\"
            background-image: url('https://s32519.pcdn.co/wp-content/uploads/2019/08/first-6-months-as-a-developer-at-relex-social-image.jpeg.optimal.jpeg');
          \">
      <h3>Coding</h3>
    </div>
    <div class=\"slide\" style=\"
            background-image: url('https://c0.wallpaperflare.com/preview/428/871/775/school-coding-data-software-development-thumbnail.jpg');
          \">
      <h3>Workshop</h3>
    </div>
    <div class=\"slide\" style=\"
            background-image: url('https://svitla.com/uploads_converted/0/1709-developers2.webp?1552986943');
          \">
      <h3>Meeting</h3>
    </div>
    <div class=\"slide\" style=\"
            background-image: url('https://wallpapercrafter.com/desktop/276255-work-notebook-coffee-and-laptop-hd.jpg');
          \">
      <h3>Work Hard</h3>
    </div>
  </div>
</div>

<script>
  function slidesPlugin(activeSlide = 0) {
    const slides = document.querySelectorAll(\".slide\");

    slides[activeSlide].classList.add(\"active\");

    for (const slide of slides) {
      slide.addEventListener(\"click\", () => {
        clearActiveClasses();
        slide.classList.add(\"active\");
      });
    }

    function clearActiveClasses() {
      slides.forEach((slide) => {
        slide.classList.remove(\"active\");
      });
    }
  }

  slidesPlugin(2);

</script>
", "modules/custom/job/templates/home.html.twig", "/Users/ibrahim/Sites/devdesktop/drupalweb/modules/custom/job/templates/home.html.twig");
    }
}
