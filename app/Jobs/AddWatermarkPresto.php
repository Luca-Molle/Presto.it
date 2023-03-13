<?php

namespace App\Jobs;

use App\Models\Image;
use Spatie\Image\Image as SpatieImage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\Image\Manipulations;

class AddWatermarkPresto implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $announcement_image_id; 
    /**
     * Create a new job instance.
     */
    public function __construct($announcement_image_id)
    {
        $this->announcement_image_id = $announcement_image_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $i = Image::find($this->announcement_image_id);
        if (!$i) {
            return;
        }

        $srcPath = storage_path('app/public/' . $i->path);
        $image = file_get_contents($srcPath);

        $image = SpatieImage::load($srcPath);

            $image->watermark(base_path('resources\img\logo.png'))
                  ->watermarkPosition('bottom-right')
                //   ->watermarkPadding(40,40, Manipulations::UNIT_PERCENT)
                  ->watermarkOpacity(50);
                //   ->watermarkHeight(20, Manipulations::UNIT_PERCENT)
                //   ->watermarkWidth(100, Manipulations::UNIT_PERCENT);
            $image->save($srcPath);
    }
}
