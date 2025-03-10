<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* base.html.twig */
class __TwigTemplate_4348f7665f7dcff56818d73d350900e4 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        yield "<h2>";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["titreDeLaPage"]) || array_key_exists("titreDeLaPage", $context) ? $context["titreDeLaPage"] : (function () { throw new RuntimeError('Variable "titreDeLaPage" does not exist.', 1, $this->source); })()), "html", null, true);
        yield "</h2>

";
        // line 4
        yield "
<form method=\"POST\" action=\"connexion\">
    <table>
        <tr>
            <td>Login : </td>
            <td><input type=\"text\" name=\"login\" value=\"\" size=\"20\" maxlenght=\"20\"/></td>
        <tr>
        <tr>
            <td>Mot de passe : </td>
            <td><input type=\"password\" name=\"mdp\" value=\"\"/></td>
        <tr>
        <tr>
            <td>
            <input type=\"submit\" name=\"ok\" value=\"Se connecter\">
            <input type=\"reset\" name=\"effacer\" value=\"Effacer\">
            </td>
        </tr>
    </table>
</form>";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "base.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  51 => 4,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<h2>{{ titreDeLaPage }}</h2>

{# {{ form(connexionForm)}} #}

<form method=\"POST\" action=\"connexion\">
    <table>
        <tr>
            <td>Login : </td>
            <td><input type=\"text\" name=\"login\" value=\"\" size=\"20\" maxlenght=\"20\"/></td>
        <tr>
        <tr>
            <td>Mot de passe : </td>
            <td><input type=\"password\" name=\"mdp\" value=\"\"/></td>
        <tr>
        <tr>
            <td>
            <input type=\"submit\" name=\"ok\" value=\"Se connecter\">
            <input type=\"reset\" name=\"effacer\" value=\"Effacer\">
            </td>
        </tr>
    </table>
</form>", "base.html.twig", "C:\\BHLM_Symfony\\BHLM_E6_php\\BHLM_E6\\templates\\base.html.twig");
    }
}
