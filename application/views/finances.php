<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Foonances</title>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, width=device-width, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="/assets/normalize.css" media="all">
	<link rel="stylesheet" type="text/css" href="/assets/skeleton.css" media="all">
	<link rel="stylesheet" type="text/css" href="/assets/custom.css" media="all">
	<link href='//fonts.googleapis.com/css?family=Raleway:400,300,600' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="container">
	<section class="header">
		<h1>Foonances &#9825;</h1>
	</section>
	<section class="add-form">
		<form action='/finances/add/'>
			<div class="row">
				<div class="six columns">
					<label for="price">Price:</label>
					<input type="number" id="price" name="price" placeholder="0.00" class="u-full-width"/>
				</div>
				<div class="six columns">
					<label for="category">Category:</label>
					<select id="category" name="category" class="u-full-width">
						<?php foreach ($categories as $category): ?>
							<option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<label for="description">Description:</label>
			<input type="text" id="description" name="description" placeholder="Profi, Carrefour, Present for..." class="u-full-width" />
			<div style="margin-top: 15px">
				<button type="submit" class="button-primary u-full-width" name="submit">Send</button>
			</div>
		</form>
	</section>
	<section class="display-entries">
		<h2>Last entries</h2>
	</section>
	</div>
</div>

</body>
</html>
