 <?= $this->include('layouts/header') ?>

 <div class="wrapper">
     <?= $this->include('layouts/sidebar') ?>

     <div class="main-panel" style="height: 100vh">
         <div class="content p-3">
             <?= $this->renderSection('content') ?>
         </div>
     </div>
 </div>

 <?= $this->include('layouts/footer') ?>