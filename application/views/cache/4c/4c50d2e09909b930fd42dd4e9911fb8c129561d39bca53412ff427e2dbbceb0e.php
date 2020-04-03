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

/* admin/blank.twig */
class __TwigTemplate_abe3c935a89c46ca82444294f12fbecc69da76b63863b011c2db680a956b156a extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "        <div class=\"breadcrumbs\">
            <div class=\"breadcrumbs-inner\">
                <div class=\"row m-0\">
                    <div class=\"col-sm-4\">
                        <div class=\"page-header float-left\">
                            <div class=\"page-title\">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-sm-8\">
                        <div class=\"page-header float-right\">
                            <div class=\"page-title\">
                                <ol class=\"breadcrumb text-right\">
                                    <li><a href=\"#\">Dashboard</a></li>
                                    <li><a href=\"#\">Table</a></li>
                                    <li class=\"active\">Data table</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class=\"content\">
            <div class=\"animated fadeIn\">
                <div class=\"row\">

                    <div class=\"col-md-12\">
                        <div class=\"card\">
                            <div class=\"card-header\">
                                <strong class=\"card-title\">Data Table</strong>
                            </div>
                            <div class=\"card-body\">
                            Page rendered in <strong>{elapsed_time}</strong> seconds.
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class=\"clearfix\"></div>

        <footer class=\"site-footer\">
            <div class=\"footer-inner bg-white\">
                <div class=\"row\">
                    <div class=\"col-sm-6\">
                        Copyright © 2018 Ela Admin
                    </div>
                    <div class=\"col-sm-6 text-right\">
                        Designed by <a href=\"https://colorlib.com\">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
    <script src=\"https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js\"></script>
    <script src=\"<?= base_url(\"assets/js/main.js\") ?>\"></script>


    <script src=\"<?= base_url(\"assets/js/lib/data-table/datatables.min.js\") ?> \"></script>
    <script src=\"<?= base_url(\"assets/js/lib/data-table/dataTables.bootstrap.min.js\") ?> \"></script>
    <script src=\"<?= base_url(\"assets/js/lib/data-table/dataTables.buttons.min.js\") ?> \"></script>
    <script src=\"<?= base_url(\"assets/js/lib/data-table/buttons.bootstrap.min.js\") ?> \"></script>
    <script src=\"<?= base_url(\"assets/js/lib/data-table/jszip.min.js\") ?> \"></script>
    <script src=\"<?= base_url(\"assets/js/lib/data-table/vfs_fonts.js\") ?> \"></script>
    <script src=\"<?= base_url(\"assets/js/lib/data-table/buttons.html5.min.js\") ?> \"></script>
    <script src=\"<?= base_url(\"assets/js/lib/data-table/buttons.print.min.js\") ?> \"></script>
    <script src=\"<?= base_url(\"assets/js/lib/data-table/buttons.colVis.min.js\") ?> \"></script>
    <script src=\"<?= base_url(\"assets/js/init/datatables-init.js\") ?> \"></script>


</body>
</html>";
    }

    public function getTemplateName()
    {
        return "admin/blank.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/blank.twig", "/var/www/html/ste_online/application/views/admin/blank.twig");
    }
}
