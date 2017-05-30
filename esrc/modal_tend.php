<!-- Tender Modal Form -->
<div id="TendModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header tender">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title sechead">Tender</h4>
      </div>
      <form name="tendform" id="tendform" action="process_tend.php" method="POST">
	      <div class="modal-body black">
	      	<div class="pull-right">					
				<!-- EXISTING CACHE INFO -->
				<?php 
				// get cache information from database
				$row = $caches->getCacheInfo($targetsystem);
				if (!empty($row)) {
				?>
					<strong>Existing Cache Info</strong><br />
					Location: <?=$row['Location']?><br />
					Align: <?=$row['AlignedWith']?><br />
					Distance: <?=$row['Distance']?><br />
					Password: <?=$row['Password']?>
				<?php 
				}
				?>
				<!-- END EXISTING CACHE INFO -->
			</div>
			<div class="form-group">
				<label class="control-label" for="sys_tend">System</label>
				<input type="hidden" name="sys_tend" value="<?php echo $targetsystem ?>" />
				<span class="sechead"><?php echo $targetsystem ?></span>
			</div>
			<div class="field">
				<label class="control-label" for="status">Status</label>
				<div class="radio">
					<label for="status_1">
						<input id="status_1" name="status" type="radio" value="Healthy" <?php if (0 == $caches->isTendingAllowed($targetsystem)) {echo ' disabled="disabled" '; } ?> >
						<?php if (0 == $caches->isTendingAllowed($targetsystem)) { ?>
							Tended within the last 24 hours.
						<?php 
						}
						else 
						{
						?>
							<strong>Healthy</strong> = Anchored, safe, and full of supplies
						<?php 
						}
						?>
					</label>
				</div>
				<div class="radio">
					<label for="status_2">
						<input id="status_2" name="status" type="radio" value="Upkeep Required">
						<strong>Upkeep Required</strong> = Needs supplies
					</label>
				</div>
				<div class="radio">
					<label for="status_3">
						<input id="status_3" name="status" type="radio" value="Expired">
						<strong>Expired</strong> = Could not find or is unusable
					</label>
				</div>
			</div>
		  	<div class="field">
				<label class="control-label" for="notes">Notes<span class="descr">Is there any other important information we need to know?</span></label>
				<textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
			</div>
	      </div>
	      <div class="modal-footer">
	        <div class="form-actions">
				<input type="hidden" name="pilot" value="<?php echo isset($charname) ? $charname : 'charname_not_set' ?>" />
			    <button type="submit" class="btn btn-info">Submit</button>
			</div>
	      </div>
      </form>
    </div>

  </div>
</div>