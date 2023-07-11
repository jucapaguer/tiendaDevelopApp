<x-layouts.admin title="Ordenes">

    <div class="container">
        <div class="row">
            <div class="col">
                <h3>Ordenes</h3>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">

                    <div class="card-body">
                        <table id="ordersTable" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Cliente</th>
                                    <th>Total</th>
                                    <th>Fecha</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->user[0]->name }}</td>
                                        <td>${{ number_format($value->total, 0, ',', '.') }}</td>
                                        <td>{{ $value->created_at }}</td>
                                        <td class="opciones">
                                            <a id="edit" href="#formCategoriesEdit"
                                                data-data="{{ json_encode($value) }}" data-bs-toggle="modal"
                                                data-bs-target="#orderDetails"><i class="bi bi-eye-fill"></i></a>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Cliente</th>
                                    <th>Total</th>
                                    <th>Fecha</th>
                                    <th>Opciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="orderDetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <h5>
                                Datos de la orden
                            </h5>
                            <label for=""># Orden</label>
                            <p id="mOrder"></p>

                            <label for="">Sub total</label>
                            <p id="mSub"></p>

                            <label for="">Envio</label>
                            <p id="mEnvio"></p>

                            <label for="">Total</label>
                            <p id="mTotal"></p>

                            <label for="">Fecha</label>
                            <p id="mFecha"></p>
                        </div>
                        <div class="col-md-6 mb-2">
                            <h5>
                                Datos de facturación
                            </h5>
                            <label for="">Cliente</label>
                            <p id="mName"></p>

                            <label for="">Telefono</label>
                            <p id="mTelefono"></p>

                            <label for="">Email</label>
                            <p id="mEmail"></p>

                            <label for="">Direccion</label>
                            <p id="mDireccion"></p>
                        </div>
                        <div class="col-md-12">
                            <h5>
                                Productos
                            </h5>
                            <div id="mProductos"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const orderDetails = document.getElementById('orderDetails')
            if (orderDetails) {
                orderDetails.addEventListener('show.bs.modal', event => {
                    const datos = JSON.parse(event.relatedTarget.getAttribute('data-data'))

                    const formateador = new Intl.DateTimeFormat('es-MX', {
                        dateStyle: 'medium',
                        timeStyle: 'medium'
                    });
                    const fecha = new Date(datos.created_at);
                    const fechaFormateada = formateador.format(fecha);

                    orderDetails.querySelector('#mOrder').textContent = datos.id;
                    orderDetails.querySelector('#mSub').textContent = "$"+datos.sub_total;
                    orderDetails.querySelector('#mEnvio').textContent = "$"+datos.envio;
                    orderDetails.querySelector('#mTotal').textContent = "$"+datos.total;
                    orderDetails.querySelector('#mFecha').textContent = fechaFormateada;
                    orderDetails.querySelector('#mName').textContent = datos.user[0].name + " " + datos
                        .user[0].last_name;
                    orderDetails.querySelector('#mTelefono').textContent = datos.user[0].phone;
                    orderDetails.querySelector('#mEmail').textContent = datos.user[0].email;
                    orderDetails.querySelector('#mDireccion').textContent = datos.user_address[0].address +
                        ", " + datos.user_address[0].department + ", "
                    datos.user_address[0].state;

                    datos.items.forEach(item => {

                        var element = document.createElement("p");
                        element.textContent = item.data[0].name + " x" + item.quantity + "  $" +
                            item.value;

                        orderDetails.querySelector('.modal-body #mProductos').appendChild(element);
                    });

                })
            }
        });
    </script>

    </x-layout>
