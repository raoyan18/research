<!DOCTYPE html>
<html lang="en">
	
				 <!-- Main content-->
			
				<div class="col-xs-10 content">
				<?php
				if($msg!='')
				{
				?>
				<div class="alert alert-<?php echo $msg_type;?> alert-dismissable"> 
					<button type="button" class="close" data-dismiss="alert" 
                                aria-hidden="true">
                                &times;
                              </button>
					<?php echo $msg;?>
					</div>
				<?php
				}
				?>
				<div class="cat">
					<?php 
					foreach ($select_news_by_id as $value) {
					echo form_open_multipart(base_url().'admin/update_news_by_id/'.$value->news_id);
					?>
				<h3><i class="fa fa-globe" aria-hidden="true"></i>Update News :</h3>

			  <div class="row">
			  <div class="col-sm-8" style="padding-right:25px;">

			  <div class="row">
				<div class="col-sm-3 form-group">
				  <h4>Photo: </h4>
				</div>
				<div class="col-sm-9 form-group pull-right" >
                <img src="<?php echo base_url();?><?php echo $value->news_photo;?>" class="img-thumbnail img-responsive " style="height:200px;">
				</div>
			  </div> 

			  <div class="row">
				<div class="col-sm-3 form-group">
				  <h4>Headline: </h4>
				</div>
				<div class="col-sm-9 form-group">
				  <input class="form-control" id="name" name="news_headline" value="<?php echo $value->news_headline; ?>" placeholder="News Headline" type="text" required>
				</div>
			  </div> 
			  
			  <div class="row">
				<div class="col-sm-3 form-group">
				  <h4>Content: </h4>
				</div>
				<div class="col-sm-9 form-group">
				  <textarea  class="form-control" id="name" name="news_text" value="" placeholder="News Content" type="text"  rows="6" required><?php echo $value->news_text; ?></textarea><br>
				</div>
			  </div> 

			  
			<!--  <div class="row">
				<div class="col-sm-3 form-group">
				  <h4>Tags</h4>
				</div>
				<div class="col-sm-9 form-group">
				  <input class="form-control" id="tags" name="news_tags" placeholder="tags" type="text" required>
				</div>
			  </div> 
			 --> 
			  
			  <div class="row">
				<div class="col-sm-3 form-group">
				  <h4>Update Photo:</h4>
				</div>
				<div class="col-sm-9 form-group">
					<input id="a" name="news_photo" placeholder="Add a photo" type="file">
			    </div>
			  </div>


			  <div class="row">
				<div class="col-sm-9 form-group pull-right">
				  <input class="form-control" id="name" name="news_id" value="<?php echo $value->news_id; ?>" placeholder="" type="hidden" required>
				</div>
			  </div> 
			  
			   <div class="row">
			  <button class="btn btn-primary pull-right" type="submit" style=" margin-top:15px;"> Update </button>
			  </div> 
			  <p class="notice"> *Give proper title, tags and add a relevant photo to your post. All these will help you to get more traffic to your web site.</p>
			



			 <?php
		echo form_close();
	}
		?>
			  </div>
			  
			   <!-- Showing all news titles-->
			  <div class="col-sm-4 form-group" style="padding-left:15px; border-left:1px dotted #ccc;">
			  <h3 style="margin-top:-25px; margin-bottom:15px; margin-left:10px;"class="col-sm-11">All news</h3>
		<?php
		foreach ($select_news as $value1) {

			$id=$value1->news_id;
				echo'<div class="row" style="padding:20px 0px 0px ">
					<div class="col-xs-9">
					<a href="'.base_url().'admin/news_by_id/'.$id.'" ><h4 class="cont-head">'.$value1->news_headline.'<span class="label label-success"></span></h4></a>
					</div>
					<div class="col-xs-1">';
					?>
					 <a id="<?php echo $id;?>" style="color:red;"title="delete" onclick="return confirm('Are you sure want to delete this news?');" href="<?php echo base_url();?>admin/delete_news/<?php echo $id;?>">Delete </a>
					
					</div>
					</div>
		<?php
		}			
		?>					
								

		<?php
			$count = count($select_news);
		?>
				<div class="row" style="padding:20px 0px 0px ">
					<div class="col-xs-11">
						<?php
						if($count==0)
							echo 'Oops! No news uploaded!';
						?>
					</div>
				</div>
							
									
				</div>
</body>
</html>



