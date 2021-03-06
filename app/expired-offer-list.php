<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>
<?php

$getStu = $admin->getAllExpiredOffer();
?>
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Expired Offer List</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">offer list</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <?php
                    if (isset($_SESSION['courseUpdateMessage'])) {
                        echo $_SESSION['courseUpdateMessage'];
                        unset($_SESSION['courseUpdateMessage']);
                    }
                    ?>
                    <div class="card-body">
                        <h5 class="card-title">All Expired Offer</h5>
                        <br>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered tbl">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Program</th>
                                        <th>Batch</th>
                                        <th>Semester</th>
                                        <th>Offer Date</th>
                                        <th>Registration End</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($getStu) {
                                        $i = 0;
                                        while ($result = $getStu->fetch_assoc()) {
                                            $i++;
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $result['program']; ?></td>
                                                <td><?php echo $result['batch']; ?></td>
                                                <td><?php echo $result['semester']; ?></td>
                                                <td><?php echo $fm->formatDate($result['offer_date']); ?></td>
                                                <td><?php echo $fm->formatDate($result['registration_end']); ?></td>
                                                <td>
                                                <a target="_blank" href="view-offer-details.php?oid=<?php echo $result['id']; ?>"><span class="label label-primary"><i class="fas fa-eye"></i></span></a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>



