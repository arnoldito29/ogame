<?php

namespace App\Services;

use App\Modules\Server;

class ServerService
{
    public function __construct(Server $server)
    {
        $this->server = $server;
    }

    public function getServerBySlug(string $slug)
    {
        $slug = $this->validate($slug);
        $server = $this->server::where('slug', $slug)->first();

        if (empty($server) && !empty($slug)) {
            $server = $this->addServer(['name' => $slug, 'slug' => $slug]);
        }

        return $server;
    }

    public function addServer(array $data)
    {
        $server = new Server();
        $server->name = !empty($data['name']) ? $data['name'] : '';
        $server->slug = $data['slug'];

        $server->save();

        return $server;
    }

    public function validate(string $url)
    {
        $server = preg_split("/[.,\/]+/", $url);

        return !empty($server[1]) ? $server[1] : null;
    }
}
