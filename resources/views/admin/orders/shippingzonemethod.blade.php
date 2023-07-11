<x-layouts.admin title="Metodos de Envio">

    <div class="container">
        <div class="row">
            <div class="col">
                <h3>Métodos de envió</h3>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#formCategories" role="button"
                        aria-expanded="false" aria-controls="collapseExample">
                        Agregar
                    </a>
                </p>
                <div class="collapse mb-4" id="formCategories">
                    <div class="card">
                        <div class="card-body p-4">
                            <h4 class="fs-4 card-title fw-bold mb-4">Nuevo método de envió</h4>
                            <form method="POST" action="{{ route('admin.shipping.create') }}" class="needs-validation"
                                novalidate="" autocomplete="off">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-5">
                                        <input type="text" name="name" class="form-control" placeholder="Nombre"
                                            aria-label="Nombre" required>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" name="value" class="form-control" placeholder="Valor"
                                            aria-label="Valor">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary ms-auto" style="width: 100% !important;">
                                            Registrar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">

                    <div class="card-body">
                        <table id="shippingzone" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Valor</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shipping_zone_methods as $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->value }}</td>
                                        <td class="opciones">
                                            <form method="POST"
                                                action="{{ route('admin.shipping.delete', $value->id) }}"
                                                class="needs-validation" novalidate="" autocomplete="off">
                                                @csrf
                                                <button type="submit" class="">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Valor</th>
                                    <th>Opciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-layout>