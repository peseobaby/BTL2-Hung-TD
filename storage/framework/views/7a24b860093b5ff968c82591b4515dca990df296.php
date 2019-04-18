<!DOCTYPE html>
<html>
<head>
	<title>Activation Email - Allaravel.com</title>
</head>
<body>
	<p>
		Chào mừng <?php echo e($user->name); ?> đã đăng ký thành viên . Bạn hãy click vào đường link sau đây để hoàn tất việc đăng ký.
		</br>
		<a href="<?php echo e($user->activation_link); ?>"><?php echo e($user->activation_link); ?></a>
	</p>
</body>
</html>
