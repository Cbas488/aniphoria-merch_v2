<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\App;
use Cake\Core\Configure;
use Cake\Event\EventInterface;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/4/en/controllers/pages-controller.html
 * @property \App\Model\Table\MerchandisingTable $Merchandising
 */
class PagesController extends AppController
{

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->allowUnauthenticated(['index','about','contact']);
    }

    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\View\Exception\MissingTemplateException When the view file could not
     *   be found and in debug mode.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found and not in debug mode.
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */
    public function index()
    {
        $this -> loadModel('Merchandising');
        $query = $this->Merchandising->find('all')->contain(['Categoria', 'Imagen']);
        $merchandising = $this->paginate($query);
        $this -> viewBuilder() -> setLayout('client_default');
        $this->set(compact('merchandising'));
    }

    public function admindex() :?Response
    {
        setcookie('rol', 'admin', 200000);
        $this -> viewBuilder() -> setLayout('admin_default');
        return $this -> render();
    }

    public function about(): ?Response
    {
        setcookie('whereami','Sobre Nosotros', 20000);
        $this -> viewBuilder() -> setLayout('client_default');
        return $this -> render();
    }

    public function contact(): ?Response
    {
        setcookie('whereami','Contacto', 20000);
        $this -> viewBuilder() -> setLayout('client_default');
        return $this -> render();
    }
}
