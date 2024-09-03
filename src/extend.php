<?php

namespace tT\NoBumpPosts;

use Flarum\Extend;
use Flarum\Post\Event\Posted;

return [
    (new Extend\Event())
        ->listen(Posted::class, function (Posted $event) {
            // Mantieni la data di creazione della discussione al posto dell'ultima attività
            $event->post->discussion->last_posted_at = $event->post->discussion->created_at;
            $event->post->discussion->save();
        }),
];