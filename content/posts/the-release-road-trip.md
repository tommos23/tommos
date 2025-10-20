---
title: "The Release Road Trip"
date: 2025-10-20
draft: false
tags: ["development", "mobile", "ci-cd", "testing", "analytics", "ab-testing"]
categories: ["development", "mobile"]
---

Understanding where your project is headed is key to building a product with purpose. Just like planning a road trip, you must know your destination before you set off. This becomes particularly important when inheriting projects from other teams. Without proper direction, you risk spending too much time on detours that add little value.

Many inherited projects function fine but are far from impressive. I think of these as "rusty cars," that sit stagnant. Their releases take too long and the user experience they provide leaves much to be desired.

![Rusty car sitting in a field](https://github.com/user-attachments/assets/936e68de-5b94-49f7-b265-a2002c278711)

## From 0 to 60

Historically, big feature releases were a common approach to these rusty car projects, but at Accenture, we've shifted our focus to quicker, smaller updates to bring about more effective change. This way, we can gradually transform the product with incremental wins rather than relying on a single, risky overhaul.

We start with building unit and UI tests, following the principles of the testing pyramid. Next comes automating processes through Continuous Integration and Continuous Deployment (CI/CD) pipelines.

The goal is to automate as much as possible, from building to uploading, directly to the app store. This allows us to release features quickly, giving us more time to focus on enhancing the project's goals. It's not about making sweeping changes overnight but creating lasting value.

![Modern hot rod with flame design](https://github.com/user-attachments/assets/5f91d99c-b8ea-4a7f-a770-b2281131e3aa)

## Your Roadmap and GPS

Once your app is "roadworthy", how do you plot your course? You could call the project a success because it's functional, but the real game-changer is knowing how to drive the product forward. We look to data for direction.

Analytics are the GPS for your project, providing answers to questions like: Where are users spending the most time? What's the crash rate? Who is using the app, and where are they dropping off? Metrics like these give us a clear view of the product's strengths and areas for improvement.

In one use case, I worked on a sports betting app that was getting very few reviews, and most of the feedback we did receive was negative. We hypothesised that users enjoyed the app but weren't motivated to go out of their way to write a positive review. The introduction of in-app reviews made it easier for happy users to share their thoughts. As a result, positive reviews surged, unlocking a feedback loop that improved the app's rating and increased downloads.

![GPS and analytics visualization with satellites](https://github.com/user-attachments/assets/d2b5a687-4637-4bc0-8e72-7f2957be91ba)

## Finding Traffic Jams With AI-enabled A/B Testing

This brings me to one of the most exciting tools in mobile development: A/B testing. This allows us to experiment with different user experiences, making data-backed decisions about which features to release. Sometimes, the results are surprising. A small change — like adding an extra click — might seem to contradict common beliefs about UX, but can sometimes lead to increased conversions.

When you introduce AI and machine learning, A/B testing becomes even more powerful as it evolves and learns continuously. We can now create highly personalised experiences for users, offering multiple variants to test. For instance, Firebase's remote configuration personalisation tool automatically adjusts what's displayed to each user, optimising for our chosen objectives.

Where once product owners led the charge in deciding what features to implement next, with A/B testing, the entire team can contribute by looking at the data and making user-driven decisions. For customers, it means a more tailored experience. For developers, it demonstrates the value we're creating through data-backed decisions.

A/B testing, enhanced by AI and machine learning, allows us to not only keep pace but stay ahead, delivering real-time, meaningful, user-focused updates that evolve alongside customer needs. At Accenture's Mobile Practice, we see data as the key to unlocking continuous innovation. By embedding analytics and experimentation into every stage of development, we ensure that every project — whether brand new or a "rusty car" — has the potential to deliver exceptional value. The journey doesn't end when the product is released; it's just the beginning of the optimisation road trip.
