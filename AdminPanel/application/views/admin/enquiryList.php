                <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                            	<div class="panel-body">
                                   <div class="table-responsive">
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                              <th>Sno</th>
                                                <th>Name</th>
                                                <th>Father Name</th>
                                                <th>Mobile</th>
                                                <th>Address</th>
                                                <th>Date</th>
                                              
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php $res = $this->db->get("enquiry")->result();?>
                                        	<?php foreach($res as $row):
                                        	$i=1;?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $row->name; ?></td>
                                                <td><?php echo $row->father_name; ?></td>
                                                <td><?php echo $row->mobile; ?></td>
                                                <td><?php echo $row->address; ?></td>
                                                 <td><?php  $date = $row->date; 
                                                 echo $newDate = date("d-m-Y", strtotime($date));
                                                 ?></td>
                                                 <td>
                                                	<a href="<?php echo base_url();?>apanelForms/deleteEnquiry/<?php echo $row->sno;?>/fskhknkfskljkljksdf">Delete
                                                	</a>
                                            </tr>
                                            <?php $i++; endforeach;?>
                                        </tbody>
                                       </table>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->