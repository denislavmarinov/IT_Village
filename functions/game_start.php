<?php 
include ('../includes/header.php');
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
				<form action="#" method="post">
					<label for="moves">
						<p>How much moves will you have?</p>
						<input id="moves" type="number" name="moves" min="1" max="50" required>
					</label>
					<p></p>
					<label for="player_color">
						<p>Select your color</p>
						<select id="player_color" name="player_color" required>
							<option value="red">Red</option>
							<option value="blue">Blue</option>
							<option value="yellow">Yellow</option>
							<option value="green">Green</option>
							<option value="gray">Gray</option>
							<option value="orange">Orange</option>
							<option value="purple">Purple</option>
							<option value="brown">Brown</option>
							<option value="pink">Pink</option>
						</select>
					</label>
					</div>

					<!-- Modal footer -->
					<div class="modal-footer">
					<input class="btn btn-primary" id="registration_form" type="submit" name="submit">
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
		$_SESSION['moves'] = (int)$_POST['moves']+1;
		include ('game_table_refresh.php');
	}
	if (!empty($_SESSION['player_color'])) {
		header("Location: ../game.php");
	}
