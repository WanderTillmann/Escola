<?php

namespace App\Services;

use Illuminate\Contracts\Support\Arrayable;

class LinksGenerator implements Arrayable
{

  protected $links = [];

  /**
   * adiciona tudo dentro do array
   *
   * @param string $type
   * @param string $rel
   * @param string $uri
   * @return void
   */
  public function add(string $type, string $rel, string $uri): void
  {
    $this->links[] = [
      'type' => $type,
      'rel' => $rel,
      'uri' => $uri,
    ];
  }

  /**
   * Adiciona como get
   *
   * @param string $rel
   * @param string $uri
   * @return self
   */
  public function addGet(string $rel, string $uri): self
  {
    $this->add('GET', $rel, $uri);
    return $this;
  }

  /**
   * Adiciona como Post
   *
   * @param string $rel
   * @param string $uri
   * @return self
   */
  public function addPost(string $rel, string $uri): self
  {
    $this->add('POST', $rel, $uri);
    return $this;
  }

  /**
   * Adiciona como PUT
   *
   * @param string $rel
   * @param string $uri
   * @return self
   */
  public function addPUT(string $rel, string $uri): self
  {
    $this->add('PUT', $rel, $uri);
    return $this;
  }

  /**
   * Adiciona como delete
   *
   * @param string $rel
   * @param string $uri
   * @return self
   */
  public function addDelete(string $rel, string $uri): self
  {
    $this->add('DELETE', $rel, $uri);
    return $this;
  }

  /**
   * formata em array simples
   *
   * @return array
   */
  public function toArray(): array
  {
    return $this->links;
  }
}
