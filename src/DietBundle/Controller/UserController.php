<?php

namespace DietBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use DietBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/user")
 * @Security("has_role('ROLE_USER')")
 */
class UserController extends Controller
{
    /**
     * @Route("/edit/weight")
     * @Template()
     */    
    public function editWeightAction(Request $request)
    {   
        $user = $this->get('security.token_storage')->getToken()->getUser();
     
        if(!$user){
            throw $this->createNotFoundException('Wystapil bląd aplikacji.');
        }
        $form = $this->createFormBuilder($user)->add('waga')->add('submit', 'submit')->getForm();
    
        $form->handleRequest($request);
    
        if($form->isValid()){
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('diet_user_showprofile');
        }
        return ['form' => $form->createView()];
    }
    
    /**
     * @Route("/showProfile")
     */
    public function showProfileAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $userWaga = $user->getWaga();
        $userWzrost = $user->getWzrost();
        $userWiek = $user->getWiek();
        return $this->render('DietBundle:User:showProfile.html.twig', array(
            'user' => $user,
        ));
    }
    
    /**
     * @Route("/edit/height")
     * @Template()
     */    
    public function editHeightAction(Request $request)
    {   
        $user = $this->get('security.token_storage')->getToken()->getUser();
     
        if(!$user){
            throw $this->createNotFoundException('Wystapil bląd aplikacji.');
        }
        $form = $this->createFormBuilder($user)->add('wzrost')->add('submit', 'submit')->getForm();
    
        $form->handleRequest($request);
    
        if($form->isValid()){
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('diet_user_showprofile');
        }
        return ['form' => $form->createView()];
    }
    
    /**
     * @Route("/edit/age")
     * @Template()
     */    
    public function editAgeAction(Request $request)
    {   
        $user = $this->get('security.token_storage')->getToken()->getUser();
     
        if(!$user){
            throw $this->createNotFoundException('Wystapil bląd aplikacji.');
        }
        $form = $this->createFormBuilder($user)->add('wiek')->add('submit', 'submit')->getForm();
    
        $form->handleRequest($request);
    
        if($form->isValid()){
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('diet_user_showprofile');
        }
        return ['form' => $form->createView()];
    }
    
}
    
   

