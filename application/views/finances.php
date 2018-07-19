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
	<section class="messages">
		<?php if ($insert_entry_successful === true): ?>
			<div class="message">Entrada insertada con éxito.</div>
		<?php endif; ?>
		<?php if ($remove_entry_successful === true): ?>
			<div class="message">Entrada eliminada con éxito.</div>
		<?php endif; ?>
	</section>
	<section class="add-form">
		<form action='/finances/insert_entry/' method="post">
			<div class="row">
				<div class="six columns">
					<label for="price">Precio:</label>
					<input type="text" id="price" name="price" placeholder="0.00" class="u-full-width"/>
				</div>
				<div class="six columns">
					<label for="category">Categorías:</label>
					<select id="category" name="category" class="u-full-width">
						<?php foreach ($categories as $id => $name): ?>
							<option value="<?php echo $id ?>"><?php echo $name ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<label for="description">Descripción:</label>
			<input type="text" id="description" name="description" placeholder="Profi, Carrefour, Regalo para..." class="u-full-width" />
			<div style="margin-top: 15px">
				<button type="submit" class="button-primary u-full-width" name="submit">Enviar</button>
			</div>
		</form>
	</section>
	<section class="last-entries">
		<h2>Últimas 20 entradas</h2>
		<table class="u-full-width">
			<thead>
			<tr>
				<th>Categoría</th>
				<th>Precio</th>
				<th>Descripción</th>
				<th>Fecha</th>
				<th>Acción</th>
			</tr>
			</thead>
			<tbody>
				<?php foreach ($entries as $entry): ?>
					<tr>
						<td><?php echo $categories[$entry->category] ?></td>
						<td><?php echo $entry->price ?></td>
						<td><?php echo $entry->description ?></td>
						<td><?php echo substr($entry->creation_date, 0, 10) ?></td>
						<td><a href="/finances/delete_entry/<?php echo $entry->id ?>" onclick="return confirm('¿Seguro que quieres eliminar esta entrada?')">Eliminar</a></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</section>
	</div>
</div>
</body>
</html>
