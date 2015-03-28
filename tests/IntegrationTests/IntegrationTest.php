<?php

/**
 * Integration tests for components throughout the application.
 *
 * This testing supports and varifies the architectural design of the application.
 * It ensures that all components of the application can communicate with each other
 * as expected.
 *
 * From high-level perspective:
 * -Model, View Controller can communicate and operate as expected and as defined in 
 * the application architectural design specification.
 * -Model can successfully integrate with and communicate with storage systems as 
 * defined in the application architectural design specification.
 * 
 * From low-level perspective:
 * -Core controllers can communicate with spreadsheet factory.
 * -Core controllers can communicate with user factory.
 */
class IntegrationTest extends TestCase {
	
}