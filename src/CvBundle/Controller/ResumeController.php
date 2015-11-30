<?php
// src/CvBundle/Controller/ResumeController.php

namespace CvBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Resume controller.
 */
class ResumeController extends Controller
{
    /**
     * Show a resume entry
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $resume = $em->getRepository('CvBundle:Resume')->find($id);

        $formation = $em->getRepository('CvBundle:Formation')->find($id);

        $experience = $em->getRepository('CvBundle:Experience')->find($id);

        if (!$resume) {
            throw $this->createNotFoundException('Unable to find a resume.');
        }

        return $this->render('CvBundle:Resume:show.html.twig', array(
            'resume'      => $resume,
            'formation'   =>$formation,
            'experience'   =>$experience,

        ));
    }
}
