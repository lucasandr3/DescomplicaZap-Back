<!-- Container -->
<div class="container mt-xl-50 mt-sm-30 mt-15">
    <!-- Title -->
    <div class="hk-pg-header align-items-top">
        <div>
            <h2 class="hk-pg-title font-weight-600 mb-10">Olá, <?=getStore()->name_company?></h2>
            <p>Aqui você acompanha todos os pedidos</p>
        </div>
<!--        <div class="d-flex">-->
<!--            <button class="btn btn-sm btn-outline-light btn-wth-icon icon-wthot-bg mr-15 mb-15"><span class="icon-label"><i class="fa fa-envelope-o"></i> </span><span class="btn-text">Email </span></button>-->
<!--            <button class="btn btn-sm btn-outline-light btn-wth-icon icon-wthot-bg mr-15 mb-15"><span class="icon-label"><i class="fa fa-print"></i> </span><span class="btn-text">Print </span></button>-->
<!--            <button class="btn btn-sm btn-danger btn-wth-icon icon-wthot-bg mb-15"><span class="icon-label"><i class="fa fa-download"></i> </span><span class="btn-text">Export </span></button>-->
<!--        </div>-->

        <div class="d-flex w-135p">
            <?php if(getStore()->open_status === 'OPEN'): ?>
                <span class="badge badge-green badge-sm badge-pill ml-10" style="font-size: 14px;border-radius: 5px;letter-spacing: 1px;display: flex;align-items: center;"><span class="material-icons">meeting_room</span>Loja Aberta</span>
            <?php else: ?>
                <span class="badge badge-danger badge-sm badge-pill ml-10" style="font-size: 14px;border-radius: 5px;letter-spacing: 1px;display: flex;align-items: center;"><span class="material-icons">door_back</span>Loja Fechada</span>
            <?php endif; ?>
        </div>
    </div>
    
    <!-- /Title -->
    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="hk-row">
                <div class="col-lg-12">
<!--                    <div class="hk-row">-->
<!--                        <div class="col-lg-4">-->
<!--                            <div class="card card-sm">-->
<!--                                <div class="card-body pa-0">-->
<!--                                    <div class="pa-15 mb-10">-->
<!--                                        <span class="d-block font-14 font-weight-500 text-dark">New Users</span>-->
<!--                                        <div class="d-flex align-items-center justify-content-between">-->
<!--                                            <div class="display-5 font-weight-400 text-dark">12M</div>-->
<!--                                            <div class="font-13 font-weight-500">-->
<!--                                                <span>-28.12%</span>-->
<!--                                                <i class="ion ion-md-arrow-down text-danger ml-5"></i>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div id="sparkline_1"></div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-lg-4">-->
<!--                            <div class="card card-sm">-->
<!--                                <div class="card-body pa-0">-->
<!--                                    <div class="pa-15 mb-10">-->
<!--                                        <span class="d-block font-14 font-weight-500 text-dark">New Sessions</span>-->
<!--                                        <div class="d-flex align-items-center justify-content-between">-->
<!--                                            <div class="display-5 font-weight-400 text-dark">76.4%</div>-->
<!--                                            <div class="font-13 font-weight-500">-->
<!--                                                <span>2.12%</span>-->
<!--                                                <i class="ion ion-md-arrow-up text-success ml-5"></i>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div id="sparkline_2"></div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-lg-4">-->
<!--                            <div class="card card-sm">-->
<!--                                <div class="card-body pa-0">-->
<!--                                    <div class="pa-15 mb-10">-->
<!--                                        <span class="d-block font-14 font-weight-500 text-dark">Time on Site</span>-->
<!--                                        <div class="d-flex align-items-center justify-content-between">-->
<!--                                            <div class="display-5 font-weight-400 text-dark">2m 15s</div>-->
<!--                                            <div class="font-13 font-weight-500">-->
<!--                                                <span>39.15%</span>-->
<!--                                                <i class="ion ion-md-arrow-up text-success ml-5"></i>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div id="sparkline_3"></div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->

                    <!-- Seção de Pedidos Novos -->
                    <section class="hk-sec-wrapper">
                        <h5 class="hk-sec-title">Novos Pedidos</h5>
                        <p class="mb-40">Aqui estão pedidos novos, que ainda não foram aceitos.</p>
                        <div class="row">
                            <div class="col-sm">
                                <div class="table-wrap mb-30">
                                    <div class="table-responsive">
                                        <table id="datable_1" class="table display pb-30">
                                            <thead>
                                            <tr>
                                                <th>Pedido</th>
                                                <th>Bairro</th>
                                                <th>Hora do Pedido</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th>Ações</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(!empty($new_orders)): foreach($new_orders as $order): ?>
                                            <tr>
                                                <td><a href="javascript:void(0)">pedido #<?=$order['id']?></a></td>
                                                <td>
                                                    <?php $endereco = ['address' => $order['order_address']]; ?>
                                                    <?php if(isset(json_decode($endereco['address'])->retirada)) : ?>
                                                        <p>Retirada</p>
                                                    <?php else : ?>
                                                        <?php $entrega = explode(",", json_decode($endereco['address'])->bairro); ?>
                                                        <p><?=$entrega[0]?></p>
                                                    <?php endif; ?>
                                                </td>
                                                <td><span class="text-muted"><i class="icon-clock font-13"></i> <?=$order['our_order']?></span> </td>
                                                <td><?=real($order['total_order'])?></td>
                                                <td>
                                                    <div class="badge badge-soft-purple"><?=($order['order_status'] === 'WAITING')? 'Confirmar Pedido':''?></div>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="" class="btn btn-outline-secondary btn-xs"><span class="material-icons" style="margin-top: 5px;font-size: 20px;">mode_edit</span></a>
                                                        <a href="" class="btn btn-outline-secondary btn-xs"><span class="material-icons" style="margin-top: 5px;font-size: 20px;">receipt</span></a>
                                                        <a href="" class="btn btn-outline-secondary btn-xs"><span class="material-icons" style="margin-top: 5px;font-size: 20px;">print</span></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Fim da Seção pedidos Novos-->

                    <!-- Seção de Pedidos Em Andamento -->
                    <section class="hk-sec-wrapper">
                        <h5 class="hk-sec-title">Pedidos Em Andamento</h5>
                        <p class="mb-40">Aqui estão pedidos que estão sendo preparados<p>
                        <div class="row">
                            <div class="col-sm">
                                <div class="table-wrap mb-30">
                                    <div class="table-responsive">
                                        <table  id="datable_pp" class="table display pb-30">
                                            <thead>
                                            <tr>
                                                <th>Pedido</th>
                                                <th>Bairro</th>
                                                <th>Hora do Pedido</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th>Ações</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(!empty($orders_progress)): foreach($orders_progress as $order): ?>
                                                <tr>
                                                    <td><a href="javascript:void(0)">pedido #<?=$order['id']?></a></td>
                                                    <td>
                                                        <?php $endereco = ['address' => $order['order_address']]; ?>
                                                        <?php if(isset(json_decode($endereco['address'])->retirada)) : ?>
                                                            <p>Retirada</p>
                                                        <?php else : ?>
                                                            <?php $entrega = explode(",", json_decode($endereco['address'])->bairro); ?>
                                                            <p><?=$entrega[0]?></p>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><span class="text-muted"><i class="icon-clock font-13"></i> <?=$order['our_order']?></span> </td>
                                                    <td><?=real($order['total_order'])?></td>
                                                    <td>
                                                        <div class="badge badge-soft-orange"><?=($order['order_status'] === 'PROGRESS')? 'Em Preparo...':''?></div>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="" class="btn btn-outline-secondary btn-xs"><span class="material-icons" style="margin-top: 5px;font-size: 20px;">mode_edit</span></a>
                                                            <a href="" class="btn btn-outline-secondary btn-xs"><span class="material-icons" style="margin-top: 5px;font-size: 20px;">receipt</span></a>
                                                            <a href="" class="btn btn-outline-secondary btn-xs"><span class="material-icons" style="margin-top: 5px;font-size: 20px;">print</span></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Fim da Seção pedidos Em Andamento-->

                    <!-- Seção de Pedidos saiu para entrega -->
                    <section class="hk-sec-wrapper">
                        <h5 class="hk-sec-title">Saiu para Entrega</h5>
                        <p class="mb-40">Aqui estão pedidos que saíram pra entrega.</p>
                        <div class="row">
                            <div class="col-sm">
                                <div class="table-wrap mb-30">
                                    <div class="table-responsive">
                                        <table id="datable_pd" class="table display pb-30">
                                            <thead>
                                            <tr>
                                                <th>Pedido</th>
                                                <th>Bairro</th>
                                                <th>Hora do Pedido</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th>Ações</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(!empty($orders_delivery)): foreach($orders_delivery as $order): ?>
                                                <tr>
                                                    <td><a href="javascript:void(0)">pedido #<?=$order['id']?></a></td>
                                                    <td>
                                                        <?php $endereco = ['address' => $order['order_address']]; ?>
                                                        <?php if(isset(json_decode($endereco['address'])->retirada)) : ?>
                                                            <p>Retirada</p>
                                                        <?php else : ?>
                                                            <?php $entrega = explode(",", json_decode($endereco['address'])->bairro); ?>
                                                            <p><?=$entrega[0]?></p>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><span class="text-muted"><i class="icon-clock font-13"></i> <?=$order['our_order']?></span> </td>
                                                    <td><?=real($order['total_order'])?></td>
                                                    <td>
                                                        <div class="badge badge-soft-primary"><?=($order['order_status'] === 'DELIVERY')? 'Saiu para entrega':''?></div>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="" class="btn btn-outline-secondary btn-xs"><span class="material-icons" style="margin-top: 5px;font-size: 20px;">mode_edit</span></a>
                                                            <a href="" class="btn btn-outline-secondary btn-xs"><span class="material-icons" style="margin-top: 5px;font-size: 20px;">receipt</span></a>
                                                            <a href="" class="btn btn-outline-secondary btn-xs"><span class="material-icons" style="margin-top: 5px;font-size: 20px;">print</span></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Fim da Seção pedidos saiu para entrega-->

<!--                    <div class="hk-row">-->
<!--                        <div class="col-md-12">-->
<!--                            <div class="card">-->
<!--                                <div class="card-header card-header-action">-->
<!--                                    <h6>Total Sales</h6>-->
<!--                                    <div class="d-flex align-items-center card-action-wrap">-->
<!--                                        <div class="inline-block dropdown">-->
<!--                                            <a class="dropdown-toggle no-caret" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="ion ion-ios-more"></i></a>-->
<!--                                            <div class="dropdown-menu dropdown-menu-right">-->
<!--                                                <a class="dropdown-item" href="#">Action</a>-->
<!--                                                <a class="dropdown-item" href="#">Another action</a>-->
<!--                                                <a class="dropdown-item" href="#">Something else here</a>-->
<!--                                                <div class="dropdown-divider"></div>-->
<!--                                                <a class="dropdown-item" href="#">Separated link</a>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="card-body">-->
<!--                                    <div class="d-flex align-items-start justify-content-between mb-15">-->
<!--                                        <div class="display-6 text-dark">$40,630.59</div>-->
<!--                                        <div class="font-16 text-green font-weight-500">-->
<!--                                            <i class="ion ion-md-arrow-up mr-5"></i>-->
<!--                                            <span>5.12%</span>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div id="e_chart_2" class="echart" style="height:190px;"></div>-->
<!--                                    <div class="hk-legend-wrap mt-10">-->
<!--                                        <div class="hk-legend">-->
<!--                                            <span class="d-10 bg-red rounded-circle d-inline-block"></span><span>Today</span>-->
<!--                                        </div>-->
<!--                                        <div class="hk-legend">-->
<!--                                            <span class="d-10 bg-red-light-4 rounded-circle d-inline-block"></span><span>Yesterday</span>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
            </div>
        </div>
<!--        <div class="col-lg-4">-->
<!--            <div class="card card-sm">-->
<!--                <div class="card-body">-->
<!--                    <div class="hk-legend-wrap mb-10">-->
<!--                        <div class="hk-legend">-->
<!--                            <span class="d-10 bg-red rounded-circle d-inline-block"></span><span>Today</span>-->
<!--                        </div>-->
<!--                        <div class="hk-legend">-->
<!--                            <span class="d-10 bg-red-light-4 rounded-circle d-inline-block"></span><span>Yesterday</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div id="e_chart_1" class="echart" style="height:155px;"></div>-->
<!--                    <div class="row mt-20">-->
<!--                        <div class="col-4">-->
<!--                            <span class="d-block text-capitalize">Previous</span>-->
<!--                            <span class="d-block font-weight-600 font-13">79.82</span>-->
<!--                        </div>-->
<!--                        <div class="col-4">-->
<!--                            <span class="d-block text-capitalize">% Change</span>-->
<!--                            <span class="d-block font-weight-600 font-13">+14.29</span>-->
<!--                        </div>-->
<!--                        <div class="col-4">-->
<!--                            <span class="d-block text-capitalize">Trend</span>-->
<!--                            <span class="block">-->
<!--													<i class="zmdi zmdi-trending-down text-danger font-20"></i>-->
<!--												</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
    </div>
    <!-- /Row -->
</div>
<!-- /Container -->