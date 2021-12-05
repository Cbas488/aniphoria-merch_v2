<?php
declare(strict_types=1);
namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

class DashboardController extends  AppController{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $conn = ConnectionManager::get('default');
        $xsemana = $conn->execute("SELECT TRUNCATE(SUM(subtotal-((subtotal*porcentaje)/100)), 2) AS todo, semana FROM (
                                            SELECT SUM(m.precio*pm.cantidad) AS subtotal,
                                            IF(p.cupon_id IS NULL , 0, c.porcentaje) AS porcentaje, WEEK(p.fecha) as SEMANA FROM pedido p
                                              INNER JOIN pedido_merchandising pm ON p.id = pm.pedido_id
                                              INNER JOIN merchandising m ON pm.merchandising_id = m.id
                                              INNER JOIN cupon c ON p.cupon_id = c.id OR p.cupon_id IS NULL
                                            WHERE MONTH(p.fecha) = MONTH(NOW())
                                            GROUP BY p.id) AS T
                                          GROUP BY semana
                                        ORDER BY semana DESC;")->fetchAll();

        $xmes = $conn->execute("SELECT TRUNCATE(SUM(subtotal-((subtotal*porcentaje)/100)), 2) AS todo, mes FROM (
                                           SELECT SUM(m.precio*pm.cantidad) AS subtotal,
                                           IF(p.cupon_id IS NULL , 0, c.porcentaje) AS porcentaje, MONTHNAME(p.fecha) as mes FROM pedido p
                                             INNER JOIN pedido_merchandising pm ON p.id = pm.pedido_id
                                             INNER JOIN merchandising m ON pm.merchandising_id = m.id
                                             INNER JOIN cupon c ON p.cupon_id = c.id OR p.cupon_id IS NULL
                                           WHERE YEAR(p.fecha) = YEAR(NOW())
                                           GROUP BY p.id) AS T
                                         GROUP BY mes
                                         ORDER BY mes DESC LIMIT 5")->fetchAll();

        $xanio = $conn->execute("SELECT TRUNCATE(SUM(subtotal-((subtotal*porcentaje)/100)), 2) AS todo, anio FROM (
                                            SELECT SUM(m.precio*pm.cantidad) AS subtotal, IF(p.cupon_id IS NULL , 0, c.porcentaje) AS porcentaje, YEAR(p.fecha) as anio FROM pedido p
                                              INNER JOIN pedido_merchandising pm ON p.id = pm.pedido_id
                                              INNER JOIN merchandising m ON pm.merchandising_id = m.id
                                              INNER JOIN cupon c ON p.cupon_id = c.id OR p.cupon_id IS NULL
                                          WHERE (YEAR(p.fecha) BETWEEN YEAR(CURDATE() - INTERVAL 5 YEAR) AND YEAR(NOW()))
                                          GROUP BY p.id) AS T
                                        GROUP BY anio
                                        ORDER BY anio DESC;")->fetchAll();
        $this->set(compact('xsemana', 'xmes', 'xanio'));
    }
}
?>