<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ArticleRepository;
use AppBundle\Entity\CategoryRepository;
use AppBundle\Entity\TagRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class ApiController
 * @package AppBundle\Controller
 *
 * @Route("/api")
 */
class ApiController extends Controller
{
    /**
     * @Route("/article/{id}", name="api_article", defaults={"id"=null}, requirements={"id"="\d+"})
     */
    public function articleAction($id)
    {
        // Retrieve Doctrine Manager
        $em = $this->getDoctrine()->getManager();

        // Retrieve Entity Repository
        /** @var ArticleRepository $repo */
        $repo = $em->getRepository('AppBundle:Article');

        // Retrieve all Pokemon entities
        $articles = $repo->findAllArticles($id);

        return new JsonResponse($articles);
    }

    /**
     * @Route("/category/{id}", name="api_category", defaults={"id"=null}, requirements={"id"="\d+"})
     */
    public function categoryAction($id)
    {
        // Retrieve Doctrine Manager
        $em = $this->getDoctrine()->getManager();

        // Retrieve Entity Repository
        /** @var CategoryRepository $repo */
        $repo = $em->getRepository('AppBundle:Category');

        // Retrieve all Category entities
        $categories = $repo->findAllCategories($id);

        return new JsonResponse($categories);
    }

    /**
     * @Route("/tag/{id}", name="api_tag", defaults={"id"=null}, requirements={"id"="\d+"})
     */
    public function tagAction($id)
    {
        // Retrieve Doctrine Manager
        $em = $this->getDoctrine()->getManager();

        // Retrieve Entity Repository
        /** @var TagRepository $repo */
        $repo = $em->getRepository('AppBundle:Tag');

        // Retrieve all Tag entities
        $tag = $repo->findAllTags($id);

        return new JsonResponse($tag);
    }
} 