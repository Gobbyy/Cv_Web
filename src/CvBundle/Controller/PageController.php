<?php
// src/CvBundle/Controller/PageController.php
namespace CvBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CvBundle\Entity\Resume;
use CvBundle\Form\ResumeType;
use CvBundle\Form\ResumeEditType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class PageController extends Controller
{
    //public function indexAction()
    //{
    //    return $this->render('CvBundle:Page:index.html.twig');
    //}

    public function aboutAction()
    {
        return $this->render('CvBundle:Page:about.html.twig');
    }

    public function creationAction()
    {
        return $this->render('CvBundle:Page:creation.html.twig');
    }

    public function addAction(Request $request){

      $resume = new Resume();
      $form = $this->get('form.factory')->create(new ResumeType(), $resume);

      if($form->handleRequest($request)->isValid()){
        $em = $this->getDoctrine()->getManager();
        $em->persist($resume);
        $em->flush();

        $request->getSession()->getFlashBag()->add('notice','Well done mate');

        return $this->redirect($this->generateUrl('cv_show', array('id'=>$resume->getId())));
      }
        return $this->render('CvBundle:Page:add.html.twig', array('form' => $form->createView(),
      ));

    }

    public function editAction($id, Request $request){

      $em = $this->getDoctrine()->getManager();

      $resume = $em->getRepository('CvBundle:Resume')->find($id);

      if( null == $resume){
        throw new NotFoundHttpException("Pas de cv ".$id."dommage");
      }

      $form = $this->createForm(new ResumeEditType(), $resume);

      if($form->handleRequest($request)->isValid()){
        $em->flush();

        $request->getSession()->getFlashBag()->add('notice','modif faite');

        return $this->redirect($this->generateUrl('cv_show', array('id'=> $resume->getId())));
      }

      return $this->render('CvBundle:Page:add.html.twig', array(
        'form' => $form->createView(),
        'resume' => $resume
      ));
    }

    public function deleteAction($id, Request $request)
    {
      $em = $this->getDoctrine()->getManager();

      $resume = $em->getRepository('CvBundle:Resume')->find($id);

      if (null === $resume) {
        throw new NotFoundHttpException("Le cv d'id ".$id." n'existe pas.");
      }

      $form = $this->createFormBuilder()->getForm();

      if ($form->handleRequest($request)->isValid()) {
        $em->remove($resume);
        $em->flush();

        $request->getSession()->getFlashBag()->add('info', "Le cv a bien été supprimée.");

        return $this->redirect($this->generateUrl('cv_homepage'));
      }

      return $this->render('CvBundle:Page:delete.html.twig', array(
        'resume' => $resume,
        'form'   => $form->createView()
      ));
    }

      public function indexAction(){

        $em = $this->getDoctrine()->getManager();

        $resume = $em->createQueryBuilder()
                      ->select('b')
                      ->from('CvBundle:Resume', 'b')
                      ->getQuery()
                      ->getResult();

        return $this->render('CvBundle:Page:index.html.twig', array(
            'resume' => $resume
        ));
      }





}
