<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    /**
     * @Route("/http", name="app_http")
     */
    public function indexHttp(): Response
    {
        return $this->render('home/http.html.twig');
    }
    /**
     * @Route("/php", name="app_php")
     */
    public function indexPHP(): Response
    {
        return $this->render('home/php.html.twig');
    }
    /**
     * @Route("/symfony", name="app_symfony")
     */
    public function indexSymfony(): Response
    {
        return $this->render('home/symfony.html.twig');
    }
    /**
     * @Route("/style", name="app_style")
     */
    public function indexStyle(): Response
    {
        return $this->render('home/style.html.twig');
    }
    /**
     * @Route("/symfony/mvc", name="app_mvc")
     */
    public function indexMvc(): Response
    {
        return $this->render('home/mvc.html.twig');
    }
    /**
     * @Route("/style/css", name="app_css")
     */
    public function indexCss(): Response
    {
        return $this->render('home/css.html.twig');
    }
    /**
     * @Route("/style/javascript", name="app_javascript")
     */
    public function indexJavascript(): Response
    {
        return $this->render('home/javascript.html.twig');
    }
    /**
     * @Route("/style/bootstrap", name="app_bootstrap")
     */
    public function indexBootstrap(): Response
    {
        return $this->render('home/bootstrap.html.twig');
    }
    /**
     * @Route("/git", name="app_git")
     */
    public function indexGit(): Response
    {
        return $this->render('home/git.html.twig');
    }
    /**
     * @Route("/http/html", name="app_html")
     */
    public function indexHtml(): Response
    {
        return $this->render('home/html.html.twig');
    }
    /**
     * @Route("/request", name="app_request")
     */
    public function indexRequest(): Response
    {
        return $this->render('home/request.html.twig');
    }




}
