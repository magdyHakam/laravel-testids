<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class AddTestIdsCommand extends Command
{
    protected $signature = 'testids:add';

    protected $description = 'Add data-testid attribute to <a> and <input> tags in Blade files';

    public function handle()
    {
        $files = File::allFiles(resource_path('views'));

        foreach ($files as $file) {
            $content = file_get_contents($file);
            $modifiedContent = $this->addTestIds($content);
            file_put_contents($file, $modifiedContent);
        }

        $this->info('Test IDs added successfully!');
    }

    private function addTestIds($content)
    {
        $pattern = '/<(a|input)(.*?)>/';

        return preg_replace_callback($pattern, function ($matches) {
            $tag = $matches[1];
            $attributes = $matches[2];

            if (str_contains($attributes, 'data-testid')) {
                return $matches[0];
            }

            $uniqueTestId = 'test-' . uniqid();

            if ($tag === 'a') {
                return "<a {$attributes} data-testid=\"{$uniqueTestId}\">";
            }

            if ($tag === 'input') {
                return "<input {$attributes} data-testid=\"{$uniqueTestId}\">";
            }
        }, $content);
    }
}