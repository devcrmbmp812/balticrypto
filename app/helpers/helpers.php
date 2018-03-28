<?php

use App\Models\CmsPage;

    function setlogo()
    {
        return $sitelogo = CmsPage::where('slug','site_logo')->first();
    }
    function facebook()
    {
        return $sociallink = CmsPage::where('slug','sociallink')->where('title','facebook')->first();
    }
    function youtube()
    {
        return $sociallink = CmsPage::where('slug','sociallink')->where('title','youtube')->first();
    }
    function twitter()
    {
        return $sociallink = CmsPage::where('slug','sociallink')->where('title','twitter')->first();
    }
    function telegram()
    {
        return $sociallink = CmsPage::where('slug','sociallink')->where('title','telegram')->first();
    }
    function instagram()
    {
        return $sociallink = CmsPage::where('slug','sociallink')->where('title','instagram')->first();
    }
?>