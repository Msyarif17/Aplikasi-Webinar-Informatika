@if ($categoryJobVacancy->deleted_at)
    <form action={{ route('admin.category-job-vacancies.restore', $categoryJobVacancy) }} method="post" class="d-inline">
        @method('PATCH')
        @csrf
        <button type="submit" class="btn btn-success btn-flast btn-sm" data-toggle="tootlip" data-placement="top"
                title="restore"><span class="fa fa-undo"></span></button>
    </form>
@else
    <a href="{{ route('admin.category-job-vacancies.edit', $categoryJobVacancy) }}" class="btn  btn-primary btn-flat btn-sm" data-toggle="tooltip"
       data-placement="top" title="edit"><span class="fa fa-edit"></span></a>

    <form action="{{ route('admin.category-job-vacancies.destroy', $categoryJobVacancy) }}" method="post" class="d-inline"
          onsubmit="return confirm('apakah anda yakin?')">
        @csrf
        <input type="hidden" name="_method" value="delete" />
        <button type="submit" class="btn btn-danger btn-flat btn-sm delete" data-toggle="tooltip"
                data-placement="top" title="delete"><span class="fa fa-trash"></span></button>
    </form>
@endif
