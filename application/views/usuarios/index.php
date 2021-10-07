
        <?php $this->load->view('layout/navbar'); ?>

            <div class="page-wrap">
 
            <?php $this->load->view('layout/sidebar'); ?>
               
            <div class="main-content">
                    <div class="container-fluid">
                        <div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                    <i class="ik ik-users bg-blue"></i>
                                        <div class="d-inline">
                                            <h5><?php echo $titulo ?></h5>
                                            <span><?php echo $sub_titulo ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a title="Home" href="<?php echo base_url('/'); ?>"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo ?></li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <?php if ($message = $this->session->flashdata('sucesso')): ?>
                            <div class="row">
                            <div class="col-md-12">
                            <div class="alert bg-success alert-success text-white alert-dismissible fade show" role="alert">
                                <strong><i class="far fa-smile-wink"></i>&nbsp;<?php echo $message ?></strong> 
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ik ik-x"></i>
                                </button>
                                 </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if ($message = $this->session->flashdata('error')): ?>
                            <div class="row">
                            <div class="col-md-12">
                            <div class="alert bg-danger alert-danger text-white alert-dismissible fade show" role="alert">
                                <strong><i class="far fa-smile-wink"></i>&nbsp;<?php echo $message ?></strong> 
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ik ik-x"></i>
                                </button>
                                 </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                <div class="card-header d-block"><h3><a data-toggle="tooltip" data-placement="right" title="Cadastrar <?php echo $this->router->fetch_class(); ?>"class="btn bg-blue text-white float-right" href="<?php echo base_url($this->router->fetch_class() . '/core/'); ?>">&nbsp;<i class="far fa-file"></i>Novo</a></h3></div>                                          
                                    <div class="card-body">
                                        <div class="table-responsive-sm">
                                        <table class="table data-table table-sm pl-10 pr-10">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Usuário</th>
                                                    <th>E-mail</th>
                                                    <th>Nome</th>
                                                    <th>Perfil de acesso</th>
                                                    <th>Ativo</th>
                                                    <th class="nosort text-right pr-30">Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($usuarios as $user): ?>
                                                <tr>
                                                    <td><?php echo $user->id; ?></td>
                                                    <td><?php echo $user->username; ?></td>
                                                    <td><?php echo $user->email; ?></td>
                                                    <td><?php echo $user->first_name; ?></td>
                                                    <td><?php echo ($this->ion_auth->is_admin($user->id) ? 'Administrador' : 'Atendente') ?></td>
                                                    <td><?php echo ($user->active == 1 ? '<span class="badge badge-pill badge-success mb-1"><i class="fas fa-lock-open"></i>&nbsp;Sim</span>' : '<span class="badge badge-pill badge-warning mb-1"><i class="fas fa-lock"></i>&nbsp;Não</span>'); ?></td>
                                                    <td class="text-right">
                                                    <a data-toggle="tooltip" data-placement="bottom" title="Editar <?php echo $this->router->fetch_class();
                                                    ?>" href="<?php echo base_url($this->router->fetch_class() . '/core/' . $user->id); ?>" class="btn btn-icon btn-primary"><i class="ik ik-edit-2"></i></a>
                                                    <button type="button" title="Excluir <?php echo $this->router->fetch_class(); ?>" class="btn btn-icon btn-danger"data-toggle="modal" data-target="#user-<?php echo $user->id; ?>"><i class="ik ik-trash"></i></button>

                                                    </td>
                                                </tr>

                                                <div class="modal fade" id="user-<?php echo $user->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterLabel"><i class="fas fa-exclamation-circle text-danger"></i>&nbsp;Tem certeza da exclusão do registro?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                    <p>Ao clicar em <strong>SIM</strong> o registro será excluído permanente!</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button data-toggle="tooltip" data-placement="bottom" title="Cancelar exclusão" type="button" class="btn btn-secondary" data-dismiss="modal">Não, Voltar</button> 
                                        <a data-toggle="tooltip" data-placement="bottom" title="Excluir <?php echo $this->router->fetch_class();?>" href="<?php echo base_url($this->router->fetch_class() . '/del/' . $user->id); ?>" class="btn btn-danger">Sim, Excluir</a>
                                                    
                                    </div>
                                   </div>
                                 </div>
                                  </div>

                                     <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <footer class="footer">
                    <div class="w-100 clearfix">
                        <span class="text-center text-sm-left d-md-inline-block">Copyright © <?php echo date('Y'); ?> Sistem Car. Todos os direitos reservados.</span>
                        <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Desenvolvido <i class="fas fa-code text-dark"></i>&nbsp;por:&nbsp;<a href="http://topnacional.com/" class="text-dark" target="_blank">Visaotec Sistemas</a></span>
                    </div>
                </footer>
                
            </div>


        