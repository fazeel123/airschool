<?php

return [
    'ffmpeg' => [
        'binaries' => env('FFMPEG_BINARIES', env('FFMPEG_BINARIES')),
        'threads'  => 12,
    ],

    'ffprobe' => [
        'binaries' => env('FFPROBE_BINARIES', env('FFPROBE_BINARIES')),
    ],

    'timeout' => 3600,

    'enable_logging' => true,

    'set_command_and_error_output_on_exception' => false,

    'temporary_files_root' => env('FFMPEG_TEMPORARY_FILES_ROOT', sys_get_temp_dir()),
];
