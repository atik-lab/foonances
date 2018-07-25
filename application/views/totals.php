<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Finanzas - Totales</title>
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
		<h1>Totales</h1>
		<section class="links">
			<ul>
				<li class="view-totals"><a href="/finances/">Volver a la página principal</a></li>
			</ul>
		</section>
	</section>
	<section class="totales">
		<h2>Totales por mes</h2>
		<table class="u-full-width">
			<thead>
			<tr>
				<th>Año-Mes</th>
				<th>Total</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($totals_month as $month => $total_month): ?>
				<tr>
					<td><?php echo $month ?></td>
					<td><?php echo $total_month ?> €</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</section>
	<section class="totales-categoria">
		<h2>Totales por categoría</h2>
		<table class="u-full-width">
			<thead>
			<tr>
				<th>Categoría</th>
				<th>Total</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($totals_category as $category_id => $total_category): ?>
				<tr>
					<td><?php echo $categories[$category_id] ?></td>
					<td><?php echo $total_category ?> €</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</section>
</div>
</body>
</html>
