<?php
// src/Controller/CheckoutController.php
namespace App\Controller;

use App\Entity\CustomerOrder;
use App\Form\CheckoutType;
use App\Service\CartService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class CheckoutController extends AbstractController
{
    private $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    #[Route('/checkout', name: 'checkout')]
    public function checkout(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Get the cart items
        $cart = $this->cartService->getCartItems();
        if (empty($cart)) {
            return $this->redirectToRoute('app_cart');
        }

        $order = new CustomerOrder();
        $form = $this->createForm(CheckoutType::class, $order);
        $form->handleRequest($request);
        $totalAmount = 0;
        if ($form->isSubmitted() && $form->isValid()) {
            // Calculate total amount
          
            foreach ($cart as $item) {
                $totalAmount += $item['product']->getPrice() * $item['quantity'];
            }

            // Set total amount and save order
            $order->setTotalAmount($totalAmount);
            $entityManager->persist($order);
            $entityManager->flush();

            // Clear the cart
            $this->cartService->clearCart();

            // Redirect to success page
            return $this->redirectToRoute('order_success');
        }

        return $this->render('checkout/index.html.twig', [
            'form' => $form->createView(),
            'cart' => $cart,
            'total' => $totalAmount,
        ]);
    }

    #[Route('/order/success', name: 'order_success')]
    public function orderSuccess(): Response
    {
        return $this->render('checkout/success.html.twig');
    }
}
