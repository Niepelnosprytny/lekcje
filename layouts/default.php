<html>
<head>
	<title><?php echo $title ?></title>
</head>
<body>
	<h1>Hello APSL!</h1>
    <a href="<?php echo $router->generate('home')?>">Main PAGE</a><br />
    <a href="<?php echo $router->generate('body')?>">BODY PAGE</a><br />
    <a href="<?php echo $router->generate('article', ['id'=>2])?>">Article PAGE</a>
    <?php echo $content ?>
    <?php var_dump($session) ?>
    <?php var_dump($session->get('user','Anon')) ?>


</body>
</html>