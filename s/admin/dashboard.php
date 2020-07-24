<?php 
    if (!isset($_SESSION['email'])) {
        echo "<script>window.open('login.php','_self')</script>";
    } else {
		if ($user_role == "Admin") {
			$getDataPost = "SELECT * FROM posts";
			$runSql = mysqli_query($conn, $getDataPost);
			$countPosts = mysqli_num_rows($runSql);
		} else {
			$getDataPost = "SELECT * FROM posts WHERE user_id= '$id_user'";
			$runSql = mysqli_query($conn, $getDataPost);
			$countPosts = mysqli_num_rows($runSql);
		}
		

		$getCategoryPost = "SELECT category, COUNT(*) FROM posts GROUP BY category;";
		$runCategoryPost = mysqli_query($conn, $getCategoryPost);
		$i = 0 ;
		while($rowCategory = mysqli_fetch_array($runCategoryPost)) {  
			$i++;
			// echo $i;
		}

		$getUsers = "SELECT * FROM users";
		$runUsers = mysqli_query($conn, $getUsers);
		$countUsers = mysqli_num_rows($runUsers);
?>

	<div id="content-wrapper">
		<div class="container-fluid">
			<!-- breadcrumb -->
			<ol class="breadcrumb shadow-sm">
				<li class="breadcrumb-item">
					<a href="#">Dashboard</a>
				</li>
				<li class="breadcrumb-item active">
					Overview
				</li>
			</ol>
			<!-- breadcrumb end -->

			<!-- cards -->
			<div class="row">
				<div class="col-xl-3 col-sm-6 mb-3">
					<div class="card text-white o-hidden h-100" style="background-color: #5b7dff">
						<div class="card-body">
							<div class="card-body-icon">
								<i class="fas fa-file-alt" style="color: #e5e7eb;"></i>
							</div>
							<div class="mr-5"><?= $countPosts ?> Posts!</div>
						</div>
						<a href="index.php?manage-posts" class="card-footer text-white clearfix small z-1">
							<span class="float-left">View All</span>
							<span class="float-right">
								<i class="fas fa-angle-right"></i>	
							</span>
						</a>
					</div>
				</div>
				<?php if ($user_role == "Admin"): ?>
					<div class="col-xl-3 col-sm-6 mb-3">
						<div class="card text-white bg-danger o-hidden h-100">
							<div class="card-body">
								<div class="card-body-icon">
									<i class="fas fa-users" style="color: #e5e7eb;"></i>
								</div>
								<div class="mr-5"><?= $countUsers ?> Users!</div>
							</div>
							<a href="index.php?manage-users" class="card-footer text-white clearfix small z-1">
								<span class="float-left">View Details</span>
								<span class="float-right">
									<i class="fas fa-angle-right"></i>	
								</span>
							</a>
						</div>
					</div>
				<?php else: ?>
				<?php endif ?>
			</div>
			<!-- cards end -->

			<?php 
				$getPostByUser = "SELECT * FROM posts WHERE user_id = '$id_user'";
				$resultPostByUser = mysqli_query($conn, $getPostByUser);
				$key = 0;
			?>
			
			<!-- table -->
			<div class="card mb-3 shadow-sm">
				<div class="card-header">
					<i class="fas fa-table"></i> Your Posts
				</div>
				<div class="card-body" style="background-color: #fff;">
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover" id="example" width="100%" cellspacing="0">
							<thead  class="thead-dark">
								<tr>
									<th style="width:5%">No</th>
									<th>Title</th>
									<th>Date</th>
									<?php if ($user_role == "Admin"): ?>
										<th>Action</th>
									<?php else: ?>
									<?php endif ?>
								</tr>
							</thead>
							<tbody>
								<?php while ($rowPostByUser = mysqli_fetch_assoc($resultPostByUser)): $key++; ?>
								<tr>
									<td><?php echo $key; ?></td>
									<td><?php echo $rowPostByUser['title']; ?></td>
									<td><?php echo $rowPostByUser['created_at']; ?></td>
									<?php if ($user_role == "Admin"): ?>
										<td>
											<a href="index.php?create-post&edit-post=<?php echo $rowPostByUser['id']; ?>" data-toggle="tooltip" title="Edit"><i class="fas fa-edit mr-2"></i></a>
											<span> </span>
											<a href="index.php?manage-posts&delete-post=<?php echo $rowPostByUser['id']; ?>" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>
											<span> </span>
										</td>
									<?php else: ?>
										<?php endif ?>
								</tr>
								<?php endwhile ?>
							</tbody>
						</table>
					</div>
					<div class="text-right">
						<a href="index.php?manage-posts">View All Data <i class="fas fa-arrow-alt-circle-right"></i></a>
					</div>
				</div>
			</div>
			<!-- table end -->
		</div>
	</div>
<?php } ?>