
<div id="main" class="top-margin">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
    <div class="contact-form pad-top-big pad-bottom-big">
    <h3>Update blog post</h3>
    <form method="post" enctype="multipart/form-data" action= "?controller=blogPost&action=makeUpdate&id=<?php echo $blogPost->id ;?>">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-pad-left">
            <div class="form-group">
                <input type="text" name="title" placeholder="Title" value="<?= $blogPost->title; ?>"/>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-pad-right">
            <div class="form-group">
                <input type="text" name="summary" placeholder="Summary" value="<?= $blogPost->summary; ?>"/>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
            <div class="form-group">
                <textarea name="mainContent" placeholder="Main Content"> <?php echo$blogPost->mainContent;?></textarea>
            </div>
        </div>
        <div>
        <label class="control-label col-sm-4" for="itemtype">Category:  </label>
        <div class="col-sm-4">
        <select name="category">
           <?php
           $PHPSelected = '';
           $JSSelected = '';
           $SQLSelected = '';
           $GeneralSelected = '';
           if ($blogPost->category == 1)    {
               $PHPSelected = 'selected';
           }
           if ($blogPost->category == 3)    {
               $JSSelected = 'selected';
           }
           if ($blogPost->category == 2)    {
               $SQLSelected = 'selected';
           }
           if ($blogPost->category == 4)    {
               $GeneralSelected = 'selected';
           }
           ?>
            <option value="1" <?php echo $PHPSelected ?>>PHP</option>
           <option value="3" <?php echo $JSSelected ?>>JavaScript</option>
           <option value="2" <?php echo $SQLSelected ?>>MySQL</option>
           <option value="4" <?php echo $GeneralSelected ?>>General</option>
        </select>
        </div>
        </div>
        <br>
        <div>
            <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
            <input type="file" name="image" class="btn" required/>
        </div>
    
        <br>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
            <div class="form-group contactus-btn">
                <input type="submit" class="cntct-btn"/>
            </div>
        </div>

    </form>
</div>
            </div>
        </div>
    </div>
</div>