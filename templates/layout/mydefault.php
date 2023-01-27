<?= $this->element('flash/header'); ?>
<div class="container">
    <?= $this->Flash->render() ?>
    <?= $this->Breadcrumbs->render() ?>
    <?= $this->fetch('content') ?>
    
</div>
<?= $this->element('flash/footer'); ?>