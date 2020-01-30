@if ($post->documents->count())
<div class="row">
    <div class="col-md-7">
        <div class="card card-outline card-primary">
            <div class="card-body">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre del Archivo</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post->documents as $key=>$document)
                        <tr>
                            <td class="text-center py-0 align-middle">{{ $key + 1}}</td>
                            <td><i class="fas fa-file-pdf fa-2x text-danger"></i> <a href="{{url($document->url) }}"
                                    target="_blank">{{ $document->title }}</a></td>
                            <td class="text-center py-0 align-middle">
                                <form method="POST" action="{{ route('admin.documents.destroy',$document) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif