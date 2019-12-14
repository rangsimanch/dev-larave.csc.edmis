<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTaskRequest;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Indenture;
use App\Task;
use App\TaskStatus;
use App\TaskTag;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TaskController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
<<<<<<< HEAD
            $query = Task::with(['status', 'tags', 'user_create', 'indentures', 'team'])->select(sprintf('%s.*', (new Task)->table));
=======
            $query = Task::with(['status', 'tags', 'team'])->select(sprintf('%s.*', (new Task)->table));
>>>>>>> parent of 9634a6b... sprint1
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'task_show';
                $editGate      = 'task_edit';
                $deleteGate    = 'task_delete';
                $crudRoutePart = 'tasks';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });
<<<<<<< HEAD

            $table->addColumn('img_user', function ($row) {
                if ($photo = $row->user_create->img_user) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
=======
>>>>>>> parent of 9634a6b... sprint1

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : "";
            });
            $table->addColumn('status_name', function ($row) {
                return $row->status ? $row->status->name : '';
            });

            $table->editColumn('tag', function ($row) {
                $labels = [];

                foreach ($row->tags as $tag) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $tag->name);
                }

                return implode(' ', $labels);
            });

            $table->editColumn('attachment', function ($row) {
                return $row->attachment ? '<a href="' . $row->attachment->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->addColumn('user_create_name', function ($row) {
                return $row->user_create ? $row->user_create->name : '';
            });

<<<<<<< HEAD
            $table->editColumn('indenture', function ($row) {
                $labels = [];

                foreach ($row->indentures as $indenture) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $indenture->code);
                }
=======
            $table->rawColumns(['actions', 'placeholder', 'status', 'tag', 'attachment']);
>>>>>>> parent of 9634a6b... sprint1

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'img_user', 'status', 'tag', 'attachment', 'user_create', 'indenture']);
            return $table->make(true);
        }

        return view('admin.tasks.index');
    }

    public function create()
    {
        abort_if(Gate::denies('task_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statuses = TaskStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tags = TaskTag::all()->pluck('name', 'id');

        return view('admin.tasks.create', compact('statuses', 'tags'));
    }

    public function store(StoreTaskRequest $request)
    {
<<<<<<< HEAD
        $task = $request->all();
        $task['user_create_id'] = auth()->id();
        $task->tags()->sync($request->input('tags', []));
        $task->indentures()->sync($request->input('indentures', []));
        

        Task::create($task);
        
=======
        $task = Task::create($request->all());
        $task->tags()->sync($request->input('tags', []));
>>>>>>> parent of 9634a6b... sprint1

        if ($request->input('attachment', false)) {
            $task->addMedia(storage_path('tmp/uploads/' . $request->input('attachment')))->toMediaCollection('attachment');
        }

<<<<<<< HEAD
        if ($request->input('img_user', false)) {
            $task->addMedia(storage_path('tmp/uploads/' . $request->input('img_user')))->toMediaCollection('img_user');
        }
=======
>>>>>>> parent of 9634a6b... sprint1
        return redirect()->route('admin.tasks.index');
    }

    public function edit(Task $task)
    {
        abort_if(Gate::denies('task_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statuses = TaskStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tags = TaskTag::all()->pluck('name', 'id');

<<<<<<< HEAD
        $task['user_create_id'] = auth()->id();

        $task->load('status', 'tags', 'user_create', 'indentures', 'team');
        
       
=======
        $task->load('status', 'tags', 'team');
>>>>>>> parent of 9634a6b... sprint1

        return view('admin.tasks.edit', compact('statuses', 'tags', 'task'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->all());
        $task->tags()->sync($request->input('tags', []));
        $task->indentures()->sync($request->input('indentures', []));

        if ($request->input('attachment', false)) {
            if (!$task->attachment || $request->input('attachment') !== $task->attachment->file_name) {
                $task->addMedia(storage_path('tmp/uploads/' . $request->input('attachment')))->toMediaCollection('attachment');
            }
        } elseif ($task->attachment) {
            $task->attachment->delete();
        }

        return redirect()->route('admin.tasks.index');
    }

    public function show(Task $task)
    {
        abort_if(Gate::denies('task_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

<<<<<<< HEAD
        $task->load('status', 'tags', 'user_create', 'indentures', 'team');
=======
        $task->load('status', 'tags', 'team');
>>>>>>> parent of 9634a6b... sprint1

        return view('admin.tasks.show', compact('task'));
    }

    public function destroy(Task $task)
    {
        abort_if(Gate::denies('task_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $task->delete();

        return back();
    }

    public function massDestroy(MassDestroyTaskRequest $request)
    {
        Task::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
