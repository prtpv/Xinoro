<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="vendor/css/xinoro_admin_panel.css">
	<title>Панель администратора</title>
</head>
<body>
	<div class="navigation container-fluid">
		<div class="container p-2">
			<nav>
				<ul class="nav justify-content-center">
				  <li class="nav-item">
				    <a class="nav-link nav-link-active" aria-current="page" href="admin/panel">Главная</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="admin/content">Контент</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="admin/database">База</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="admin/setting">Настройки</a>
				  </li>
				</ul>
			</nav>
		</div>
	</div>
	<div class="container ms-100 me-100 mt-5">
		<div class="row">
			<div class="col-xxl-6 col-lg-12 d-flex justify-content-xxl-end justify-content-center">
				<div class="wrapper-box">
					<div class="info-box ps-3 pt-2">	
						<img class="people-img" src="vendor/image/people.svg">
						<p class="mb-1">Управление в 2 клика</p>
						<p>Управление страницами стало удобнее,<br>
						создание страницы, ограничение прав<br>
						на просмотр в 2 клика.</p>
						<button data-bs-toggle="modal" data-bs-target="#exampleModal">Создать</button>
					</div>
					<div class="item-box mt-3">
						<?php
							# Передача переменных из routes.json 
							#
							# 	URL - 0 (string)
							# 	Controller - 1 (string)
							# 	Action - 2 (string)
							# 	Title - 3 (string) 
							#   Hidden Page - 4 (boolean)
							#
							# openInEditor() - javascript(local func) - Открытие страницы в редакторе
							# showInfo() - javascript(local func) - Открытие информации о странице

							# Получение списка путей
							$pages = json_decode(file_get_contents("config/routes.json"),true);

							# Вывод путей на страницы
							for($i = 0; $i < count($pages['routes']); $i++)
							{
								echo '<div class="item" onclick="showInfo('."'".$pages["routes"][$i][3]."'".', '."'".$pages["routes"][$i][0]."'".', '."'".$pages["routes"][$i][1]."'".', '."'".$pages["routes"][$i][2]."'".', '."'".$pages["routes"][$i][4]."'".')" class="page">'.$pages["routes"][$i][3].'</div>';
							}
						?>
					</div>
					<div class="arrow-flex justify-content-end">
						<div class="left-arrow"></div>
						<div class="right-arrow"></div>
					</div>
				</div>
			</div>
			<div class="col-xxl-6 col-lg-12 d-flex justify-content-xxl-start justify-content-center">
				<div class="writer-box pt-3 ps-4 pe-4">
					<form id="openInfo" action="admin/panel" method="POST">
						<p class="mb-4">Информация о странице</p>
						<p class="mb-0 mt-1">Ссылка</p>
						<input id="url_info" name="selected_url" class="inputed_info" type="text" readonly="readonly">
						<p class="mb-0 mt-1">Контроллер</p>
						<input id="controller_info" class="inputed_info" type="text" readonly="readonly">
						<p class="mb-0 mt-1">Действие</p>
						<input id="action_info" class="inputed_info" type="text" readonly="readonly">
						<p class="mb-0 mt-1">Заголовок</p>
						<input id="title_info" class="inputed_info" type="text" readonly="readonly">
						<p class="mb-0 mt-1">Режим отображения</p>
						<input id="unvisible_info" class="btn-two btn-first" type="submit" name="pageDeactivation" value="Не активна"><input id="visible_info" class="btn-two btn-last" type="submit" name="pageActivation"value="Активна">
						<input class="btn-two btn-first-blue" type="submit" name="" value="Редактировать"><input class="btn-two btn-last" type="submit" name="deletePage" value="Удалить">
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Создание страницы</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        <div class="container-fluid">
			    <div class="row">
			    	<div class="col-12">
			    		<form action="admin/panel" method="POST">
				    		<p>Ссылка</p>
				    		<input class="inputed" type="text" name="url" placeholder="example/panel" required>
				    		<p>Контроллер</p>
				    		<input class="inputed" type="text" name="controller" placeholder="example" required>
				    		<p>Действие</p>
				    		<input class="inputed" type="text" name="action" placeholder="example" required>
				    		<p>Заголовок</p>
				    		<input class="inputed" type="text" name="title" placeholder="Example Test" required>
					        <input class="btn btn-primary" type="submit" name="createpage" value="Создать">
			    		</form>
			    	</div>
			    </div>
			</div>
	      </div>
	    </div>
	  </div>
	</div>
</body>
</html>
<script type="text/javascript" src="vendor/js/xinoro_admin_panel.js"></script>