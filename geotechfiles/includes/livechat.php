<?php 
    $theme=$this->getTheme();
    $configData=$this->getConfigurationData();
?>
<div class="chat-panel panel panel-default">
                        <div class="panel-heading" style=" background-color: <?php echo $theme[2]; ?>; color: #fff;">
                            <i class="fa fa-comments fa-fw"></i>
                            Chat
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" id="chatList">
                            
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <div class="input-group">
                            	<input id="adminname" type="hidden" value="<?php echo $_SESSION['gtadmin']; ?>"/>
                                <input id="messagen" type="text" class="form-control input-sm" placeholder="Type your message here..." value=" "/>
                                <span class="input-group-btn">
                                    <button class="btn btn-warning btn-sm" id="sendMsg">
                                        Send
                                    </button>
                                </span>
                            </div>
                        </div>
                        <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel .chat-panel -->