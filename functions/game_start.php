<?php 
session_name('IT_Village');
session_start();
include ('../includes/bootstrap_includes.php');
$player_color = "#fff";
?>
<!-- The Modal -->
	<div class="modal" id="myModal">
		<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
			<h4 class="modal-title">To start the game:</h4>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<p>Choose a your color</p>
				<form action="#" method="post">
					<select name="player_color">
						<option value="red"><span color="#fff" style="background: red;">Red</span></option>
						<option value="blue"><span color="#fff" style="background: blue;">Blue</span></option>
						<option value="yellow"><span color="#fff" style="background: yellow;">Yellow</span></option>
						<option value="green"><span color="#fff" style="background: green;">Green</span></option>
					</select>
					</div>

					<!-- Modal footer -->
					<div class="modal-footer">
					<input class="btn btn-success" type="submit" name="submit">
				</form>
			</div>

			</div>
		</div>
	</div>
</div>
<?php
	if(!isset($_POST['player_color'])){
		?>
	<script>
			$(document).ready(function(){
			  // Show the Modal on load
			  $("#myModal").modal("show");
			});
	</script>
		<?php
	}
	else{
		$player_color = $_POST['player_color'];
		$_SESSION['player_color'] = $player_color;
		include ('game_table_refresh.php');
	}
	if (!empty($_SESSION['player_color'])) {
		header("Location: ../game.php");
	}